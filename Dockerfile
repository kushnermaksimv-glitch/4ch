FROM php:8.2-apache

# Устанавливаем системные утилиты и модули для PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev curl git unzip \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Включаем модуль перенаправления Apache
RUN a2enmod rewrite

# Заставляем Apache искать index.php в первую очередь
RUN echo "DirectoryIndex index.php index.html" > /etc/apache2/mods-enabled/dir.conf

# Очищаем стандартную папку сервера
RUN rm -rf /var/www/html/*

# Клонируем официальный движок TinyIB напрямую из репозитория
RUN git clone https://github.com/tslocum/tinyib.git /var/www/html/

# Копируем ТВОИ файлы настроек и исправлений поверх движка
COPY settings.php /var/www/html/settings.php
COPY index.php /var/www/html/index.php
COPY supabase_uploader.php /var/www/html/supabase_uploader.php

# Выставляем правильные права для сервера
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

EXPOSE 80
