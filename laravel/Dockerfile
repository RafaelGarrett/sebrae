FROM php:latest

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    unzip \
    docker-php-ext-install pdo pdo_mysql \
    pecl install xdebug && docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer 

WORKDIR /var/www/html

COPY . .

CMD php artisan serve --host=0.0.0.0 --port=8000