#!/bin/bash
set -e

echo "==> Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "==> Caching config / routes / views for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Running database migrations..."
php artisan migrate --force

echo "==> Creating storage symlink..."
php artisan storage:link --quiet || true

echo "==> Starting Laravel server on port ${PORT:-10000}..."
exec php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
