# Use PHP 8.3 (you can also use 8.2 if needed)
FROM php:8.3-fpm

# System dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev sqlite3

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy all files to the container
COPY . .

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Laravel config/cache optimizations
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8080
