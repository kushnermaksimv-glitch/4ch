<?php
// =============================================================================
// КОНФИГУРАЦИЯ ИМИДЖБОРДЫ (ВЕЧНОЕ И БЕСПЛАТНОЕ ХРАНЕНИЕ)
// =============================================================================

define('TINYIB_BOARDDESC', 'Моя Анонимная Борда');
define('TINYIB_TIMEZONE', 'Europe/Moscow');

// Настройки подключения к Базе Данных Supabase (PostgreSQL)
define('TINYIB_DBMODE', 'pdo');
define('TINYIB_DBDRIVER', 'pgsql');
define('TINYIB_DBHOST', 'aws-0-eu-central-1.pooler.supabase.com'); // Проверь, чтобы в адресе было слово pooler
define('TINYIB_DBPORT', 6543); // Поставь именно 6543 вместо 5432
define('TINYIB_DBNAME', 'postgres');
define('TINYIB_DBUSER', 'postgres.tszlvntdykvzrzavckea'); 
define('TINYIB_DBPASSWORD', 'kushnermaks12'); 

// Настройки сохранения (0 = хранить посты НАВСЕГДА, без удаления старых)
define('TINYIB_MAXPOSTS', 0);
define('TINYIB_TRUNCATE', 0);

// Настройки Supabase Storage для картинок
define('SUPABASE_PROJECT_ID', 'tszlvntdykvzrzavckea'); 
define('SUPABASE_ANON_KEY', sb_publishable_2BzG1TT8unHbeiMs4wpTAQ_B02CSjsr); 
define('SUPABASE_BUCKET', 'images'); 

// Ключ администратора для управления досками и удаления спама
define('TINYIB_MANAGEKEY', 'AdminPassword123'); // Пароль для входа в /manage.php

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
define('TINYIB_CAPTCHA', '');
define('HCAPTCHA_SITEKEY', '');
define('HCAPTCHA_SECRETKEY', '');
