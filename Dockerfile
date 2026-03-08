FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev nodejs npm \
    netcat-openbsd \
    && docker-php-ext-install pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run production || true

EXPOSE 8080

CMD php artisan config:clear && php artisan migrate --force || true && php artisan serve --host=0.0.0.0 --port=$PORT