# Dockerfile
# Build phase
COPY .env /app/.env

# Install Node.js dependencies
RUN npm install --production

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Run Laravel optimizations and caching
RUN php artisan optimize

RUN php artisan config:cache

RUN php artisan route:cache

RUN php artisan view:cache

# Run migrations
RUN php artisan migrate --force
