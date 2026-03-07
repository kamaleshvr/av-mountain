FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm \
    netcat-openbsd \
    && docker-php-ext-install pdo_mysql zip

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install frontend dependencies
RUN npm install

# Build assets (Laravel Mix)
RUN npm run production || true

# Clear Laravel caches
RUN php artisan config:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

# Create startup script
RUN echo '#!/bin/sh \
echo "Waiting for database..." \
while ! nc -z $DB_HOST $DB_PORT; do \
  sleep 2 \
done \
echo "Database connected!" \
php artisan migrate --force \
php artisan config:cache \
php artisan route:cache \
php artisan view:cache \
php artisan serve --host=0.0.0.0 --port=8080 \
' > /start.sh

RUN chmod +x /start.sh

EXPOSE 8080

CMD ["/start.sh"]