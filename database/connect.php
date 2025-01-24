<?php

$db = new PDO(
    'mysql:host=localhost;dbname=libreria',
    'root',
    '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);

function errlog(Exception $e, string $component): void{
    error_log("[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . "\n", '3', "log/$component.log");
}
