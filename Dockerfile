FROM php:8.2-apache

# Устанавливаем модули для работы с PostgreSQL в PHP
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Очищаем стандартную папку
RUN rm -rf /var/www/html/*

# Копируем созданные нами коды в рабочую папку сервера
COPY . /var/www/html/

# Назначаем права доступа
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
