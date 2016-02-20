<?php
require_once 'config.php';
try
{
    $GLOBALS['DB'] = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
}
catch (Exception $ex)
{
    echo '<p>Error: Could not connect to database</p>';
    echo $ex;
    die;
}