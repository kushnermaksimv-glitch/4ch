<?php
// Если базы данных еще нет или это первый запуск, 
// просто принудительно открываем панель управления
if (!file_exists('index.html')) {
    include('manage.php');
} else {
    include('index.html');
}
?>
