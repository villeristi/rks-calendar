FROM php:8.2-apache

RUN a2enmod rewrite
RUN apt-get update && apt-get install -y libicu72 libicu-dev
RUN docker-php-ext-install mysqli pdo pdo_mysql intl
RUN apt-get update && apt-get install -y locales && \
  sed -i 's/^# *\(en_US.UTF-8\)/\1/' /etc/locale.gen && \
  sed -i 's/^# *\(en_GB.UTF-8\)/\1/' /etc/locale.gen && \
  locale-gen

RUN localedef -i en_GB -c -f UTF-8 -A /usr/share/locale/locale.alias en_GB.UTF-8 && \
    localedef -i fi_FI -c -f UTF-8 -A /usr/share/locale/locale.alias fi_FI.UTF-8
ENV LANG en_GB.UTF-8
ENV LANGUAGE en_GB:fi_FI

COPY web/ /var/www/html/
COPY docker-config.inc.php /var/www/html/config.inc.php
