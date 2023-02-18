FROM php:8-fpm-alpine

ENV PHP_GROUP=laravel
ENV PHP_USER=laravel

# Add user
RUN adduser -g ${PHP_GROUP} -s /bin/sh -D ${PHP_USER}

# sed user and group
# we make this beacuse if they are the same as local machine the docker file will not run probely
RUN sed -i "s/user = www-data/user = ${PHP_USER}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${PHP_GROUP}/g" /usr/local/etc/php-fpm.d/www.conf


# make a public dir
RUN mkdir -p /var/www/html/public

# Install PHP Extension (pdo)
RUN docker-php-ext-install pdo pdo_mysql

# Execute the php
CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]

