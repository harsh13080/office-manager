# Laravel Office Manager

This Laravel application includes:

- Company & Employee CRUD
- DataTables integration
- Country/State/City fetching via Universal Tutorial API
- Manager self-reference via employee table
- Bootstrap UI

## Installation

```bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git
cd laravel-office-manager
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
