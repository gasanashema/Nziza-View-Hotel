#!/bin/sh

# Copy .env file if it doesn't exist
if [ ! -f .env ]; then
    echo "Creating .env file from .env.example..."
    cp .env.example .env
fi

# Generate application key if not set
if ! grep -q "APP_KEY=base64:" .env; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Wait for MySQL database container to be active and accepting connections
echo "Waiting for database connection..."
until php -r "
try {
    \$host = getenv('DB_HOST') ?: '127.0.0.1';
    \$port = getenv('DB_PORT') ?: '3306';
    \$db   = getenv('DB_DATABASE') ?: 'laravel';
    \$user = getenv('DB_USERNAME') ?: 'root';
    \$pass = getenv('DB_PASSWORD') ?: '';
    new PDO(\"mysql:host=\$host;port=\$port;dbname=\$db\", \$user, \$pass);
    exit(0);
} catch (Exception \$e) {
    exit(1);
}
" 2>/dev/null; do
    echo "Database is unavailable - sleeping..."
    sleep 2
done

echo "Database is connected! Running migrations..."
php artisan migrate --force

echo "Seeding the database..."
php artisan db:seed --force

echo "Starting Apache Web Server..."
exec apache2-foreground
