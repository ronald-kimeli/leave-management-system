#!/bin/bash

# Ensure that 'vendor/autoload.php' exists, if not run composer install
if [ ! -f "vendor/autoload.php" ]; then
    echo "Running composer install..."
    composer install --no-progress --no-interaction
fi

# Check if the .env file exists, and if not, create it
if [ ! -f ".env" ]; then
    echo "Creating .env file for env $APP_ENV"
    cp .env.example .env
else
    echo ".env file already exists."
fi

# If the .env file exists, perform additional setup tasks
if [ -f ".env" ]; then
    echo "Running artisan commands..."

    php artisan key:generate
    php artisan config:clear
    php artisan view:clear
    php artisan migrate:fresh --seed

    # Set permissions
    chmod -R 777 storage/
    chown -R www-data:www-data storage/
    chmod -R 777 bootstrap/

    echo "App is now ready to handle requests."
fi

# Start PHP-FPM and Nginx
php-fpm &  # Run PHP-FPM in the background
nginx -g "daemon off;"  # Start Nginx in the foreground
