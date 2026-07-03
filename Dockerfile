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

# На всякий случай удаляем index.html движка, если он там есть
RUN rm -f /var/www/html/index.html

# Копируем ТВОИ файлы настроек и заглушку прямо поверх движка
COPY settings.php /var/www/html/settings.php
COPY index.php /var/www/html/index.php
COPY supabase_uploader.php /var/www/html/supabase_uploader.php

# НАСТРОЙКА ПРАВ (Решает проблему 403 Forbidden навсегда)
# Даем серверу Apache полные права на чтение, запись и запуск всех файлов
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html

EXPOSE 80
