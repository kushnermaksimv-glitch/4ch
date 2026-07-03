<?php
require_once 'config.php';
header('Content-Type: application/json');

try {
    $dsn = "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Проверяем существование таблицы
    $pdo->exec("CREATE TABLE IF NOT EXISTS custom_posts (
        id SERIAL PRIMARY KEY,
        name VARCHAR(100),
        message TEXT,
        image_url TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    $stmt = $pdo->query("SELECT * FROM custom_posts ORDER BY id DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($posts);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
