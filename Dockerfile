FROM php:8.2-cli

# Install system packages
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    nodejs npm netcat-openbsd \
    && docker-php-ext-install pdo_mysql zip

# Increase PHP upload limits
RUN echo "upload_max_filesize=50M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "post_max_size=50M" >> /usr/local/etc/php/conf.d/uploads.ini \
 && echo "memory_limit=256M" >> /usr/local/etc/php/conf.d/uploads.ini

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install frontend dependencies
RUN npm install
RUN npm run production

# Fix Laravel permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose port for Railway
EXPOSE 8080

# Start script
CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan migrate:fresh --force || true && \
    php artisan db:seed --force || true && \
    php artisan storage:link || true && \
    php artisan serve --host=0.0.0.0 --port=$PORT