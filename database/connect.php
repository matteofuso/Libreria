<?php

$db = null;
if (!isset($_GET['err']) || !$_GET['err'] === '0') {
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=libreria',
            'root',
            '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
    } catch (PDOException $e) {
        errlog($e, '../log/connect.log');
        header('Location: ?err=0');
        exit();
    }
}

function errlog(Exception $e, string $file): void{
    error_log("[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . "\n", '3', $file);
}
