FROM composer:latest

ENV COMPOSER_USER=laravel
ENV COMPOSER_GROUP=laravel

RUN adduser -g ${COMPOSER_GROUP} -s /bin/sh -D ${COMPOSER_USER}


