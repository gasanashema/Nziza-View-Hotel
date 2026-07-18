# --- Stage 1: Build Frontend Assets (Vite) ---
FROM node:18-alpine AS node-build

WORKDIR /app

# Copy package lock and configurations
COPY package*.json vite.config.js ./

# Install npm packages
RUN npm install

# Copy project source files and build
COPY . .
RUN npm run build

# --- Stage 2: Production PHP Apache Container ---
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql bcmath zip gd

# Enable Apache mod_rewrite module for Laravel routing
RUN a2enmod rewrite

# Copy Composer binary from official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Change Apache document root to Laravel's public directory
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

# Copy project files
COPY . .

# Copy Vite built frontend assets from stage 1
COPY --from=node-build /app/public/build ./public/build

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set correct permissions for Laravel directories
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose HTTP port
EXPOSE 80

# Run entrypoint script
ENTRYPOINT ["/var/www/html/docker-entrypoint.sh"]
