FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y unzip git curl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

WORKDIR /var/www/html

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN cp .env.example .env

RUN php artisan key:generate

RUN chmod -R 775 storage bootstrap/cache