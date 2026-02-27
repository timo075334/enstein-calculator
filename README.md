# Simple Laravel App (Railway Ready)

This project includes:

- Sign up and login pages (Laravel Breeze)
- A simple home page
- A calculator page linked from home and dashboard

## Local setup

1. Install dependencies:

```bash
composer install
npm install
```

2. Create env and app key:

```bash
copy .env.example .env
php artisan key:generate
```

3. Configure database in `.env`.

### Option A: MySQL (recommended if using MySQL Workbench)

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_app
DB_USERNAME=root
DB_PASSWORD=
```

### Option B: SQL Server

```dotenv
DB_CONNECTION=sqlsrv
DB_HOST=127.0.0.1
DB_PORT=1433
DB_DATABASE=laravel_app
DB_USERNAME=sa
DB_PASSWORD=your_password
```

4. Run migrations and start:

```bash
php artisan migrate
npm run build
php artisan serve
```

## Railway deployment

This repo includes `railway.json` with a start command:

```bash
php artisan serve --host=0.0.0.0 --port=$PORT
```

In Railway project variables, set at least:

- `APP_KEY` (generate with `php artisan key:generate --show`)
- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL` (your Railway domain)
- Database variables (`DB_*`) that match your Railway DB service

Then run migrations in Railway shell:

```bash
php artisan migrate --force
```

## Note on SQL Server + Workbench

MySQL Workbench is for MySQL. If you truly need SQL Server, use `sqlsrv` settings and a SQL Server client (for example Azure Data Studio or SSMS). For Railway free tiers, MySQL/PostgreSQL is usually simpler.
