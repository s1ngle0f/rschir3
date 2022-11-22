FROM php:apache
WORKDIR /var/www/html
COPY ./server/apache-conf/000-default.conf /etc/apache2/sites-available/000-default.conf
# COPY ./server/apache-conf/apache2.conf /etc/apache2/apache2.conf
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && \
        pecl install -o -f redis \
        &amp;&amp;  rm -rf /tmp/pear \
        &amp;&amp;  docker-php-ext-enable redis
        # # docker-php-ext-install bcmath && pecl install redis && docker-php-ext-install redis
        # apt-get update && \
        # pecl channel-update pecl.php.net && \
        # pecl install redis
        # # pecl install apcu igbinary mongodb && \
        # # # compile Redis with igbinary support
        # # pecl bundle redis && cd redis && phpize && ./configure --enable-redis-igbinary && make && make install && \
        # # docker-php-ext-install bcmath sockets && \
        # # docker-php-ext-enable apcu igbinary mongodb opcache redis
RUN a2enmod authn_dbd && apt-get update && apt-get install -y apache2-utils libaprutil1-dbd-mysql
                                                                    # && apt install php-redis
EXPOSE 8080