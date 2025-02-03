<?php
include 'utils/Database.php';
$config = require 'config.php';
Database::connect($config);
include_once 'utils/Log.php';
$title = "Inserisci";
?>
<?php require 'componenti/header.php'; ?>
<?php require 'componenti/alert.php'; ?>
    <form method="post" action="actions/insert.php" class="px-4">
        <h1>Inserimento</h1>
        <p>Inserisci i dati necessari ad aggiungere il libro</p>
        <?php require 'componenti/inputLibri.php'; ?>
        <input type="submit" class="btn btn-primary" value="Inserisci il libro">
    </form>
    <script src="scripts/form.js"></script>
<?php include 'componenti/footer.php'; ?>
