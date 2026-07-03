<?php
// Жёстко прописанные настройки Supabase
define('DB_HOST', 'aws-0-eu-central-1.pooler.supabase.com');
define('DB_PORT', 6543);
define('DB_NAME', 'postgres');
define('DB_USER', 'postgres.tszlvntdykvzrzavckea');
define('DB_PASSWORD', 'kushnermaks12');

define('SUPABASE_PROJECT_ID', 'tszlvntdykvzrzavckea');
define('SUPABASE_ANON_KEY', 'EyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InRzemx2bnRkeWt2enJ6YXZja2VhIiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODI5NjI4NzgsImV4cCI6MjA5ODUzODg3OH0.smGi6sXveyvoLvBK6UhuudV9eik42hWkMT90Cu9N5kA');
define('SUPABASE_BUCKET', 'my-4ch');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Аноним';
    $message = !empty($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
    $image_url = null;

    if (empty($message)) {
        die("Сообщение не может быть пустым!");
    }

    // Загрузка картинки
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_name = time() . '_' . basename($_FILES['image']['name']);
        
        $url = "https://" . SUPABASE_PROJECT_ID . ".supabase.co/storage/v1/object/" . SUPABASE_BUCKET . "/" . $file_name;
        $file_data = file_get_contents($file_tmp);
        $mime_type = mime_content_type($file_tmp);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $file_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . SUPABASE_ANON_KEY,
            "apikey: " . SUPABASE_ANON_KEY,
            "Content-Type: " . $mime_type
        ]);

        $res = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code == 200 || $http_code == 201) {
            $image_url = "https://" . SUPABASE_PROJECT_ID . ".supabase.co/storage/v1/object/public/" . SUPABASE_BUCKET . "/" . $file_name;
        }
    }

    // Сохранение в базу
    try {
        $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $pdo->exec("CREATE TABLE IF NOT EXISTS custom_posts (
            id SERIAL PRIMARY KEY,
            name VARCHAR(100),
            message TEXT,
            image_url TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $stmt = $pdo->prepare("INSERT INTO custom_posts (name, message, image_url) VALUES (?, ?, ?)");
        $stmt->execute([$name, $message, $image_url]);

    } catch (PDOException $e) {
        die("Ошибка Базы Данных: " . $e->getMessage());
    }

    header('Location: index.html');
    exit;
}
