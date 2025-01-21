FROM php:8.3-fpm as base
 
RUN docker-php-ext-install mysqli pdo pdo_mysql 

ENV DB_HOST mysql
 
FROM base
 
CMD ["php-fpm"]
