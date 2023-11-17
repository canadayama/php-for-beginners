FROM php:8.2-fpm-alpine

ENV LANG=C.UTF-8

WORKDIR /var/www/html

# Install system dependencies
RUN apk update && apk add git curl zip unzip

# MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Variables to configure user and permiassions
ARG WWWUSER=www
ARG WWWGROUP=www
ARG UID=1000
ARG GID=1000

# Add user for laravel application
RUN addgroup -g ${GID} ${WWWGROUP}
#RUN adduser -u ${UID} -s /bin/sh -g ${WWWGROUP} ${WWWUSER}
RUN adduser -G ${WWWGROUP} -D -u ${UID} ${WWWUSER}

USER ${WWWUSER}