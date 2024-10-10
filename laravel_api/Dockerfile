# Use the official PHP image with FPM (FastCGI Process Manager)
FROM php:8.1-fpm

# Install Nginx
RUN apt-get update && apt-get install -y nginx

# Set the working directory
WORKDIR /var/www/html

# Copy the application code
COPY . /var/www/html

# Set permissions for Laravel folders
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache \
    && chmod -R 755 /var/www/html/public/test.html

# Expose port 8080
EXPOSE 8080

# Start Nginx and PHP-FPM
CMD service nginx start && php-fpm
