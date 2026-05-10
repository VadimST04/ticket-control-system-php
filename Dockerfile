FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    openssl \
    libzip-dev

RUN docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
