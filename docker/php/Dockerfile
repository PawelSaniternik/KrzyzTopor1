FROM php:8.3-fpm-alpine

# Instalacja zależności systemowych i rozszerzeń PHP dla MariaDB / MySQL
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

# Kopiowanie plików aplikacji Symfony
COPY . .

# Instalacja zależności Composer
RUN composer install --no-dev --optimize-autoloader --no-scripts

EXPOSE 9000

CMD ["php-fpm"]