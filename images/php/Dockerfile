FROM php:5.5-fpm-alpine

MAINTAINER "Ricardo <ricardolima89@gmail.com>"

RUN apk add --update --upgrade bash git curl openssl

RUN curl -sS "https://getcomposer.org/installer" | php
RUN mv composer.phar /usr/local/bin/composer

RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony && \
    chmod a+x /usr/local/bin/symfony

RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql

COPY php.ini /usr/local/etc/php/conf.d/custom.ini
COPY fpm.conf /usr/local/etc/php-fpm.d/zzz-fpm.conf
WORKDIR /home/www-data/app

#PHP LOG FILE WRITING PERMISSION
USER www-data
RUN chown -R www-data:www-data /home/www-data/app/var/cache &&\
    chown -R www-data:www-data /home/www-data/app/var/logs &&\
    chown -R www-data:www-data /home/www-data/app/var/sessions

RUN rm -rf /var/cache/apk && mkdir -p /var/cache/apk

