FROM php:8.2-fpm

# 1. Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev sqlite3

# 2. Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# 3. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Set working directory
WORKDIR /var/www

# 5. Copy all project files
COPY . .

# 6. Set permissions for Laravel storage
RUN chmod -R 775 storage bootstrap/cache

# 7. Install PHP dependencies (production mode)
RUN composer install --optimize-autoloader --no-dev

# 8. Laravel config cache (IMPORTANT step)
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# 9. Serve Laravel (required by Render)
CMD php artisan serve --host=0.0.0.0 --port=8080
