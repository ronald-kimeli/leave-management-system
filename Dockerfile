# Use the PHP 8.1 image based on Alpine Linux
FROM php:8.1-fpm-alpine3.20

# Install necessary packages and dependencies
RUN apk add --no-cache --virtual .build-deps \
    autoconf g++ libtool make \
    libpng-dev libjpeg-turbo-dev freetype-dev zip \
    bash git redis

# Add extensions needed by Laravel (such as pdo_mysql, etc.)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Other necessary configurations (optional)
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Copy the entrypoint script
COPY entrypoint.sh /entrypoint.sh

# Make the entrypoint script executable
RUN chmod +x /entrypoint.sh

# Set the entrypoint
ENTRYPOINT ["/entrypoint.sh"]

# Expose port 9000 for PHP-FPM
EXPOSE 9000
