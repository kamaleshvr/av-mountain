FROM php:8.2-cli

# Install system packages
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    nodejs npm netcat-openbsd \
    && docker-php-ext-install pdo_mysql zip

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

# Expose port for Railway
EXPOSE 8080

# Start script
CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan migrate --force || true && \
    php artisan db:seed --force || true && \
    php artisan serve --host=0.0.0.0 --port=$PORT