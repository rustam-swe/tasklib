# Set the base image to PHP with Alpine Linux
FROM php:8.3-fpm-alpine

# Install necessary dependencies and PHP extensions
RUN apk add --no-cache \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    oniguruma-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql mbstring

# Set the working directory
WORKDIR /var/www/html

# Copy all files from the current directory to the container
COPY . /var/www/html

# Set appropriate permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 9000 (default for PHP-FPM)
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
