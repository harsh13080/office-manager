FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev sqlite3

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy all files
COPY . .

# Set permissions for Laravel storage
RUN chmod -R 775 storage bootstrap/cache

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Generate key (optional if not set in .env)
# RUN php artisan key:generate

# Cache configs
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Start Laravel dev server
CMD php artisan serve --host=0.0.0.0 --port=8080
