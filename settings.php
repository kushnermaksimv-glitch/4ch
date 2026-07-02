<?php
// =============================================================================
// КОНФИГУРАЦИЯ ИМИДЖБОРДЫ (ВЕЧНОЕ И БЕСПЛАТНОЕ ХРАНЕНИЕ)
// =============================================================================

define('TINYIB_BOARDDESC', 'Моя Анонимная Борда');
define('TINYIB_TIMEZONE', 'Europe/Moscow');

// Настройки подключения к Базе Данных Supabase (PostgreSQL)
define('TINYIB_DBMODE', 'pdo');
define('TINYIB_DBDRIVER', 'pgsql');
define('TINYIB_DBHOST', 'aws-0-eu-central-1.pooler.supabase.com'); // Замени на свой хост из Supabase
define('TINYIB_DBPORT', 6543);
define('TINYIB_DBNAME', 'postgres');
define('TINYIB_DBUSER', 'postgres.xxxx'); // Замени на свой логин
define('TINYIB_DBPASSWORD', 'Твой_Пароль_От_БД'); // Замени на свой пароль

// Настройки сохранения (0 = хранить посты НАВСЕГДА, без удаления старых)
define('TINYIB_MAXPOSTS', 0);
define('TINYIB_TRUNCATE', 0);

// Настройки Supabase Storage для картинок
define('SUPABASE_PROJECT_ID', 'xxxx'); // ID твоего проекта Supabase (из URL-адреса)
define('SUPABASE_ANON_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...'); // Твой публичный (anon) ключ API
define('SUPABASE_BUCKET', 'images'); // Имя публичного бакета, который ты создал

// Ключ администратора для управления досками и удаления спама
define('TINYIB_MANAGEKEY', 'AdminPassword123');

// Защита от спам-ботов (hCaptcha - тоже полностью бесплатная)
define('TINYIB_CAPTCHA', ''); // Поставь 'hcaptcha' когда зарегистрируешь ключи на hcaptcha.com
define('HCAPTCHA_SITEKEY', '');
define('HCAPTCHA_SECRETKEY', '');

// Остальные стандартные настройки TinyIB
define('TINYIB_INDEX', 'index.html');
define('TINYIB_MAXTHREADS', 0);
define('TINYIB_RESPONSES', 5);
define('TINYIB_MAXFILES', 1);
define('TINYIB_MAXKB', 4096);
define('TINYIB_THUMBWIDTH', 250);
define('TINYIB_THUMBHEIGHT', 250);
define('TINYIB_REPLYWIDTH', 250);
define('TINYIB_REPLYHEIGHT', 250);
define('TINYIB_REPORTKEY', '');
define('TINYIB_EMBED', '');
define('TINYIB_STRIPMETADATA', true);
