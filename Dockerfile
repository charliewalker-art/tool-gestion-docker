FROM php:8.2-fpm

RUN apt-get update && apt-get install -y git unzip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copier uniquement composer.* d'abord (meilleur cache Docker)
COPY composer.json composer.lock ./

# Installer vendor au build
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Copier le reste du code
COPY . .

# Optionnel: droits (souvent utile)
RUN chown -R www-data:www-data /var/www

