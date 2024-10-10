# Use the official PHP image with FPM (FastCGI Process Manager)
FROM php:8.1-fpm

# Install Nginx
RUN apt-get update && apt-get install -y nginx \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Set the working directory
WORKDIR /var/www/html

# Copy the application code
COPY . .

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Set permissions for Laravel folders
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Copy Nginx configuration file
COPY nginx.conf /etc/nginx/sites-available/default

# Expose port 9000
EXPOSE 9000

# Start Nginx and PHP-FPM
CMD service nginx start && php-fpm
