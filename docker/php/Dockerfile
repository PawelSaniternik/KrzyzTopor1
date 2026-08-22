#FROM php:8.3-fpm-alpine
FROM php:8.4-fpm-alpine
# Install system dependencies and PHP extensions for MariaDB / MySQL
RUN apk add --no-cache \
    git \
    unzip \
    icu-dev \
    mariadb-client \
    libzip-dev \
    && docker-php-ext-install \
    intl \
    pdo \
    pdo_mysql \
    zip \
    opcache

# Pobranie oficjalnego Composera
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy Symfony application files
COPY . .

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

EXPOSE 9000

CMD ["php-fpm"]