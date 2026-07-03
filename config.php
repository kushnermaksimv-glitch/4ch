<?php
// Твой ID проекта из Supabase
$project_id = 'tszlvntdykvzrzavckea'; 

// Твой длинный API-ключ anon public
$anon_key = 'EyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InRzemx2bnRkeWt2enJ6YXZja2VhIiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODI5NjI4NzgsImV4cCI6MjA5ODUzODg3OH0.smGi6sXveyvoLvBK6UhuudV9eik42hWkMT90Cu9N5kA';


// НАСТРОЙКИ (Код сам всё подставит автоматически!)
define('DB_HOST', 'aws-0-eu-central-1.pooler.supabase.com');
define('DB_PORT', 6543);
define('DB_NAME', 'postgres');
define('DB_USER', 'postgres.' . $project_id);
define('DB_PASSWORD', 'kushnermaks12');

define('SUPABASE_PROJECT_ID', $project_id);
define('SUPABASE_ANON_KEY', $anon_key);
define('SUPABASE_BUCKET', 'my-4ch'); // Название твоего бакета
