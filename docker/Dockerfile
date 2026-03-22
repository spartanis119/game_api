FROM php:8.4-alpine

RUN apk update && \
    apk add --no-cache \
        nodejs npm git \
        build-base autoconf openssl-dev && \
    curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    pecl install redis && \
    docker-php-ext-enable redis && \
    docker-php-ext-install pdo pdo_mysql && \
    rm -rf composer-setup.php && \
    mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
    apk del build-base autoconf openssl-dev && \
    rm -rf /var/cache/apk/*
