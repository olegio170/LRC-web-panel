<?php
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';


$dsn = "mysql:host=".HOST.";dbname=".DB.";charset=utf8";
$opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);$pdo = new PDO($dsn, USER, PASSWORD, $opt);


$stmt = $pdo->query('SELECT id FROM users');
while ($row = $stmt->fetch())
{
    echo $row['id'] . "\n";
}

Route::start(); // запускаем маршрутизатор
?>