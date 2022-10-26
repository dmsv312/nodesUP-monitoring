FROM php:8.1-fpm-alpine

RUN apk update && apk add --no-cache git oniguruma-dev libzip-dev freetype-dev libjpeg-turbo-dev libpng-dev icu-dev libxml2-dev \
#    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install mbstring zip gd intl soap opcache pdo_mysql
#    && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

WORKDIR /usr/share/nginx/html/backend

CMD ["php-fpm"]
