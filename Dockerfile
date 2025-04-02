# Use PHP-FPM Alpine image optimized for ARM
FROM --platform=linux/arm64 php:8.3-fpm-alpine

# Install required dependencies and PHP extensions
RUN apk add --no-cache \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    oniguruma-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql mbstring

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

