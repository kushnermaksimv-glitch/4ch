<?php
// Если главная страница борды еще не сгенерирована, 
// перенаправляем администратора в панель управления для создания первой доски.
if (!file_exists('index.html')) {
    header('Location: manage.php');
    exit;
} else {
    include('index.html');
}
?>
