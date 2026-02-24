# ============================================================
# Stage 1: Node — Build frontend assets with Laravel Mix
# ============================================================
FROM node:18-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json* ./
RUN npm ci

COPY webpack.mix.js ./
COPY resources/ ./resources/
COPY public/ ./public/

RUN npm run production

# ============================================================
# Stage 2: Composer — Install PHP dependencies (no dev)
# ============================================================
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock* ./
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-autoloader \
    --prefer-dist \
    --ignore-platform-reqs

COPY . .
RUN composer dump-autoload --optimize --no-dev

# ============================================================
# Stage 3: Production image
# ============================================================
FROM php:8.2-cli-alpine

# ---- Install system dependencies ----
RUN apk add --no-cache \
    bash \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    oniguruma-dev \
    icu-dev \
    shadow \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        zip \
        bcmath \
        gd \
        mbstring \
        intl \
        opcache \
        pcntl

# ---- PHP production tuning ----
RUN { \
    echo "opcache.enable=1"; \
    echo "opcache.memory_consumption=128"; \
    echo "opcache.interned_strings_buffer=16"; \
    echo "opcache.max_accelerated_files=10000"; \
    echo "opcache.revalidate_freq=0"; \
    echo "opcache.validate_timestamps=0"; \
    echo "opcache.fast_shutdown=1"; \
    } > /usr/local/etc/php/conf.d/opcache.ini

WORKDIR /var/www

# ---- Copy app from stages ----
COPY --from=vendor /app /var/www
COPY --from=frontend /app/public/css /var/www/public/css
COPY --from=frontend /app/public/js  /var/www/public/js
COPY --from=frontend /app/mix-manifest.json /var/www/mix-manifest.json

# ---- Set permissions ----
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# ---- Bootstrap: create storage links, run migrations, serve ----
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 10000

ENTRYPOINT ["docker-entrypoint.sh"]