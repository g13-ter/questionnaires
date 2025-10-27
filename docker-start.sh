#!/bin/bash

echo "Starting Laravel Questionnaire Application..."

# Wait for database to be ready
sleep 2

# Clear any cached configs
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Generate app key if needed
if [ ! -f .env ]; then
    cp .env.example .env
fi

php artisan key:generate --force

# Run migrations and seed database
php artisan migrate --force
php artisan db:seed --force

# Start Apache
exec apache2-foreground