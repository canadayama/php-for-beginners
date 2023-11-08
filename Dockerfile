FROM php:8.2-fpm-alpine

ENV LANG=C.UTF-8

WORKDIR /var/www/html

# MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
