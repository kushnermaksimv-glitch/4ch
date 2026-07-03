FROM php:8.2-apache

# Устанавливаем системные утилиты и модули для PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev curl git unzip \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Включаем модуль перенаправления Apache
RUN a2enmod rewrite

# Очищаем стандартную папку сервера перед установкой
RUN rm -rf /var/www/html/*

# Скачиваем TinyIB во временную папку и ПРИНУДИТЕЛЬНО переносим всё содержимое в корень
RUN git clone https://github.com/tslocum/tinyib.git /tmp/tinyib \
    && cp -r /tmp/tinyib/* /var/www/html/ \
    && cp -r /tmp/tinyib/.* /var/www/html/ 2>/dev/null || true \
    && rm -rf /tmp/tinyib

# Копируем ТВОИ файлы настроек и JS-редирект прямо поверх движка
COPY settings.php /var/www/html/settings.php
COPY index.html /var/www/html/index.html
COPY supabase_uploader.php /var/www/html/supabase_uploader.php

# Даем серверу максимальные права на чтение и запись (чтобы не было 403 Forbidden)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html

EXPOSE 80
