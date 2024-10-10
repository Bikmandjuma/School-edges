# Use the official PHP image with FPM (FastCGI Process Manager)
FROM php:8.1-fpm

# Install necessary packages
RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get clean

# Set the working directory
WORKDIR /var/www/html

# Copy the application code
COPY . /var/www/html

# Set permissions for Laravel folders
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Expose port 8080
EXPOSE 8080

# Copy the Nginx configuration file
COPY nginx.conf /etc/nginx/nginx.conf

# Start Nginx and PHP-FPM
CMD service nginx start && php-fpm
