FROM arm64v8/php:8.4-fpm-alpine3.22
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
RUN apk add postgresql-dev
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install fileinfo
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo pgsql pdo_pgsql
RUN docker-php-ext-install session
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd xdebug
RUN install-php-extensions zip
RUN install-php-extensions exif 
RUN install-php-extensions intl
RUN docker-php-ext-install pdo_mysql
RUN install-php-extensions pcntl
RUN install-php-extensions redis
