# Nziza View Hotel Management System

Nziza View Hotel Management System is a modern, Laravel 10 and Livewire-powered web application designed to handle hotel room reservations, room category configurations, receptionist task boards, and guest registrations.

---

## 🛠️ Technology Stack

*   **Framework**: Laravel v10 (PHP 8.2 compatible)
*   **Reactive UI Components**: Livewire v3
*   **Database**: MySQL / MariaDB (relational schema)
*   **Front-End Build**: Vite, Bootstrap 5, Sass, Axios
*   **Server Environment**: Apache HTTP Web Server (rewrites enabled)

---

## 📁 Project Structure

```
Nziza-View-Hotel/
├── app/                       # Core PHP models, controllers, and helpers
├── bootstrap/                 # Application caching and boot sequences
├── config/                    # Framework configuration parameters
├── database/                  # Schema blueprints and seeder tables
│   ├── migrations/            # Table creation migrations
│   └── seeders/               # Test data seeds (default credentials)
├── public/                    # Built web assets (JS, CSS, images)
├── resources/                 # Blade views, Sass styling, and source JS
├── routes/                    # Routing maps (web.php endpoints)
├── Dockerfile                 # Multi-stage container instructions
├── docker-compose.yml         # Container configuration orchestrator
└── docker-entrypoint.sh       # Automated container boot setup script
```

---

## 🐳 Running with Docker Compose

You can boot the entire hotel management application—including the database and webserver—automatically inside Docker containers.

### Setup and Start:
1. Ensure **Docker** and **Docker Compose** are installed and active.
2. From the project root directory, launch the build:
   ```bash
   docker compose up --build -d
   ```
3. This command will automatically:
   * Build the frontend assets using **Node.js** and **Vite**.
   * Copy the built files, resolve **Composer** dependencies, install system libraries, and launch the Apache container.
   * Start the MySQL database container.
   * **Automate Boot Sequence**: The custom `docker-entrypoint.sh` script will wait for database connectivity, generate the Laravel `APP_KEY`, run migrations (`php artisan migrate`), and seed default accounts.
4. Browse the application locally at **`http://localhost`**.

### Shut down the system:
```bash
docker compose down -v
```

---

## 🚀 How to Run the Project (Manually)

If you prefer to run the application outside of Docker, follow these manual setup steps.

### 📋 Prerequisites
*   **PHP** (v8.1 or newer recommended)
*   **MySQL Server**
*   **Composer** (PHP dependency manager)
*   **Node.js & npm** (Frontend compiler)

### Step 1: Install Dependencies
1. Extract or clone the code, and open a terminal in the root directory.
2. Install PHP Composer dependencies:
   ```bash
   composer install
   ```
3. Install and compile frontend elements:
   ```bash
   npm install
   npm run build
   ```

### Step 2: Environment Configuration
1. Duplicate `.env.example` and name the new file `.env`:
   ```bash
   cp .env.example .env
   ```
2. Open the `.env` file and adjust your database connection parameters:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nziza_view_hotel
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```
3. Generate the application key:
   ```bash
   php artisan key:generate
   ```

### Step 3: Run Database Migrations & Seeds
Run the migrations along with the default user seeders:
```bash
php artisan migrate --seed
```

### Step 4: Run the Server
1. Serve the application locally:
   ```bash
   php artisan serve
   ```
2. Open your browser and navigate to the address logged in your terminal (usually `http://127.0.0.1:8000`).

---

## 🔑 Pre-seeded Testing Credentials

Once the migrations and seeders execute successfully, you can sign in using these default profiles:

### 1. Administrator Account
*   **Email**: `admin@nzizaviewhotel.com`
*   **Password**: `admin`

### 2. Receptionist Account
*   **Email**: `user@nzizaviewhotel.com`
*   **Password**: `user`
