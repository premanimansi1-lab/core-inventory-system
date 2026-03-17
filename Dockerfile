FROM php:8.2-apache

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install system packages
RUN apt-get update && apt-get install -y unzip git curl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . /var/www/html

WORKDIR /var/www/html

# Set Laravel public folder as Apache root
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Enable Apache rewrite
RUN a2enmod rewrite

# Install Laravel dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Setup environment
RUN cp .env.example .env

# Generate app key
RUN php artisan key:generate
RUN php artisan migrate --force

# Fix permissions
RUN chmod -R 777 storage bootstrap/cache
