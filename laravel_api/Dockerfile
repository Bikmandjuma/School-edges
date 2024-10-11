# Use an official PHP image
FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    zip \
    npm

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Set the environment variable for Composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Set the working directory
WORKDIR /app

# Copy composer files first
COPY composer.json composer.lock /app/

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Copy the rest of the application files
COPY . /app

# Install Node.js dependencies and build frontend assets
RUN npm install
RUN npm run build

# Set permissions for Laravel directories
RUN chmod -R 755 storage bootstrap/cache

# Run Laravel optimization commands
RUN php artisan migrate --force
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan optimize