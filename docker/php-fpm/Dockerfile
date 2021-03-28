FROM php:8.0.3-fpm-buster
COPY wait-for-it.sh /usr/bin/wait-for-it
RUN chmod +x /usr/bin/wait-for-it

#RUN apk --update --no-cache add git
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip

RUN docker-php-ext-install pdo_mysql zip

# Install xdebug
RUN echo 'zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20160303/xdebug.so' | tee /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" | tee -a /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_handler=dbgp" | tee -a /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_port=9000" | tee -a /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=on" | tee -a /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_connect_back=0" | tee -a /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.idekey=docker" | tee -a /usr/local/etc/php/conf.d/xdebug.ini

#RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
#    && pecl install xdebug-3.0.3 \
#    && docker-php-ext-enable xdebug \
#    && apk del -f .build-deps
# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
CMD composer install ; wait-for-it database:3306 -- bin/console doctrine:migrations:migrate ;  php-fpm
EXPOSE 9000
