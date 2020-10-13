FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip

RUN a2enmod rewrite
COPY docker-files/apache2/sites-available/ /etc/apache2/sites-available/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# WORKDIR /var/www/html/
# RUN composer install