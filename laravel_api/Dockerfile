# Set the working directory
WORKDIR /app

# Copy the composer.json and composer.lock files first
COPY composer.json composer.lock /app/

# Install PHP dependencies first to leverage Docker layer caching
RUN composer install --optimize-autoloader --no-dev

# Copy the rest of the application files
COPY . /app

# Install Node.js dependencies and build frontend assets
RUN npm install && npm run build

# Set permissions for storage and bootstrap/cache directories
RUN chmod -R 755 storage bootstrap/cache

# Run Laravel Artisan commands for optimization
RUN php artisan migrate --force
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan optimize
