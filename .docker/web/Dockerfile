FROM php:7.2-apache

# Update apt-get and Install debian packages
RUN apt-get update && apt-get install -y --fix-missing --no-install-recommends \
gcc \
g++ \
sudo \
wget \
gnupg2 \
make \
libzip-dev \
zip 

# remove cmdtest it confilcts with yarn
RUN apt-get remove cmdtest

# Install zip extention
RUN docker-php-ext-configure zip --with-libzip
RUN docker-php-ext-install zip pdo_mysql

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

# Move composer out of working dir to bin directory
RUN chmod +x composer.phar && mv composer.phar /usr/local/bin/composer

# Install nodejs command line
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash
RUN apt-get install -y --fix-missing --no-install-recommends nodejs

# Install yarn through npm
RUN npm install -g yarn

# Remove unnecessary file left after installation
RUN apt-get clean -y && apt-get autoclean -y && rm -r /var/lib/apt/lists/*

# Copy local files to server
COPY ./.docker/web/php.ini /usr/local/etc/php/conf.d/my.ini

# Change Document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
