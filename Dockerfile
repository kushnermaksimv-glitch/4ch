FROM php:8.2-apache

# Установка модулей для работы с PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev curl \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Включаем модуль rewrite для красивых ссылок Apache
RUN a2enmod rewrite

# Копируем код в рабочую директорию сервера
COPY . /var/www/html/

# Даем права на запись
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80
