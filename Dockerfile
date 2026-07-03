FROM php:8.2-apache

# Устанавливаем системные утилиты и модули для PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev curl git unzip \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Включаем модуль перенаправления Apache
RUN a2enmod rewrite

# Очищаем стандартную папку сервера перед установкой
RUN rm -rf /var/www/html/*

# Клонируем официальный движок TinyIB напрямую в корень сервера
RUN git clone https://github.com/tslocum/tinyib.git /var/www/html/

# Копируем ТВОИ файлы настроек, JS-редирект и загрузчик картинок
COPY settings.php /var/www/html/settings.php
COPY index.html /var/www/html/index.html
COPY supabase_uploader.php /var/www/html/supabase_uploader.php

# Даем серверу полные права на чтение и запись
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html

EXPOSE 80
