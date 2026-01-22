# Installation Guide - StackFood

Follow these steps to set up the StackFood project on your local machine or server.

## 📋 Prerequisites

- **PHP:** ^7.3 or ^8.0
- **Extensions:** OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Curl, GD
- **Database:** MySQL 5.7+ or MariaDB 10.3+ (Needs Spatial support)
- **Tools:** [Composer](https://getcomposer.org/), [Node.js & NPM](https://nodejs.org/)

---

## 🛠 Setup Steps

### 1. Clone the repository

```bash
git clone https://github.com/your-username/houseofdelivery.git
cd houseofdelivery
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure Environment

Copy the example environment file and update the configuration:

```bash
cp .env.example .env
```

Open `.env` and configure:

- `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
- `APP_URL`
- Mail settings for notifications
- `GOOGLE_MAP_API_KEY` (Required for map features)
- `FIREBASE_SERVER_KEY` (Required for push notifications)

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Setup Database

Run the migrations and seed the database:

```bash
php artisan migrate --seed
```

_Note: If you have a `.sql` dump provided, you can import it directly to your database._

### 6. Link Storage

```bash
php artisan storage:link
```

### 7. Install Passport

This project uses Laravel Passport for API authentication:

```bash
php artisan passport:install
```

### 8. Run the Application

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`.

---

## 🔑 Default Credentials (If seeded)

- **Admin:** admin@admin.com / 12345678
- **Restaurant:** vendor@vendor.com / 12345678

## 🛡 Security Note

Never share your `.env` file or commit it to version control. Always use strong passwords for production environments.
