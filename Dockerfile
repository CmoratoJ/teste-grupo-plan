FROM wyveo/nginx-php-fpm:latest

COPY . /usr/share/nginx/html
COPY nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /usr/share/nginx/html

RUN ln -s public html
RUN apt update; \
    apt install vim -y; \
    apt install sqlite3 -y;

RUN composer install
RUN php artisan key:generate

EXPOSE 80