FROM php:8.4-alpine

RUN apk update && \
    apk add --no-cache nodejs npm git && \
    curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm -rf composer-setup.php && \
    mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
    apk --update add --virtual build-dependencies build-base openssl-dev autoconf && \
    apk del build-dependencies build-base openssl-dev autoconf && \
    rm -rf /var/cache/apk/* && \
    docker-php-ext-install pdo pdo_mysql
