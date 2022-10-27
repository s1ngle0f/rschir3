FROM php:apache
WORKDIR /var/www/html
COPY ./server/apache-conf/000-default.conf /etc/apache2/sites-available/000-default.conf
# COPY ./server/apache-conf/apache2.conf /etc/apache2/apache2.conf
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN a2enmod authn_dbd && apt-get update && apt-get install -y apache2-utils libaprutil1-dbd-mysql
EXPOSE 8080