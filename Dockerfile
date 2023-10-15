FROM php:8.1-fpm

WORKDIR /var/www/html/public

RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-configure pdo_pgsql --with-pdo-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql

CMD ["php-fpm"]

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin
