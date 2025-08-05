# Laravel Office Manager

This Laravel application includes:

- Company & Employee CRUD
- DataTables integration
- Country/State/City fetching via Universal Tutorial API
- Manager self-reference via employee table
- Bootstrap UI

## Project Overview

Features:

Company CRUD: Add, view, update, and delete companies

Employee CRUD: Add, view, update, and delete employees

Self-reference: Assign employees to managers

DataTables Integration: Advanced table with search, pagination, filtering

External API Integration: Fetch countries, states, and cities dynamically from Universal Tutorial API

Bootstrap UI with responsive design


## Folder Structure (Important Files)
├── app/Http/Controllers
│   ├── CompanyController.php
│   └── EmployeeController.php
├── resources/views
│   ├── companies/
│   ├── employees/
│   └── welcome.blade.php
├── public/
│   └── homepage-image.jpg
├── routes/
│   └── web.php
├── database/migrations
├── .env (excluded from Git)
├── .gitignore
├── README.md



## Additional Information

Manager assignment is handled via a self-referencing manager_id in the employees table.

All employee listings are shown using DataTables with dynamic search & pagination.

Universal Tutorial API is used to load country, state, and city dropdowns dynamically when adding or editing employees.


## Installation

```bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git
cd laravel-office-manager
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve



