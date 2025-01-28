<?php
include 'database/connect.php';
include "database/query.php";
include 'database/printTable.php';
$nav_page = 'Modifica';
$main_classes = 'container my-4';
/**@var $db */
?>
<?php require 'componenti/header.php'; ?>
<?php include 'componenti/alert.php'; ?>
    <h1>Pagina di modifica</h1>
<?php require 'componenti/footer.php'; ?>