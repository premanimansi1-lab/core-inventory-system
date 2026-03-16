FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

RUN apt-get update && apt-get install -y unzip git

WORKDIR /var/www/html

RUN cp .env.example .env
RUN php artisan key:generate
