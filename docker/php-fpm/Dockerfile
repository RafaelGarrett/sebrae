FROM php:8.2-fpm

SHELL ["/bin/bash", "-c"]

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    unzip

RUN apt install -y nodejs npm
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.1/install.sh | bash
RUN curl -o- https://githubusercontent.com | bash 

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN sed -E -i -e 's/max_execution_time = 30/max_execution_time = 120/' "$PHP_INI_DIR/php.ini" \
    && sed -E -i -e 's/memory_limit = 128M/memory_limit = 512M/' "$PHP_INI_DIR/php.ini" \
    && sed -E -i -e 's/post_max_size = 8M/post_max_size = 64M/' "$PHP_INI_DIR/php.ini" \
    && sed -E -i -e 's/upload_max_filesize = 2M/upload_max_filesize = 64M/' "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install pdo pdo_mysql 
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN source ~/.bashrc
#RUN nvm install 20
#RUN nvm use 20
#RUN npm run build
#RUN npm run dev
#RUN php artisan serve