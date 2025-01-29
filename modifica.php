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

<div>
    <h1>Libri</h1>
    <p>Seleziona l'azione da eseguire per ogni libro</p>
    <?php
    $query = 'select l.id, l.titolo, a.nome, g.genere, concat(l.prezzo, " €") as price, l.anno_pubblicazione from libri l join autori a on a.id = l.autore join generi g on g.id = l.genere order by l.id asc;';
    try {
        $libri = select($db, $query);
        printTable(["#", "Titolo", "Nome", "Genere", "Prezzo", "Anno di Pubblicazione", "Azione"], $libri, true);
    } catch (Exception $e) {
        echo '<p>Non ci è stato possibile visualizzare i libri, perfavore riprova più tardi</p>';
        errlog($e, 'log/catalogo.log');
    }
    ?>
</div>
<div class="row">
    <div class="col-md-6">
        <h3>Autori</h3>
        <p>Seleziona l'azione da eseguire per ogni autore</p>
        <?php
        $query = 'select a.id, a.nome from autori a;';
        try {
            $libri = select($db, $query);
            printTable(["#", "Nome", "Azione"], $libri, true);
        } catch (Exception $e) {
            echo '<p>Non ci è stato possibile visualizzare i libri, perfavore riprova più tardi</p>';
            errlog($e, 'log/catalogo.log');
        }
        ?>
    </div>
    <div class="col-md-6">
        <h3>Generi</h3>
        <p>Seleziona l'azione da eseguire per ogni categoria</p>
        <?php
        $query = 'select g.id, g.genere from generi g;';
        try {
            $libri = select($db, $query);
            printTable(["#", "Genere", "Azione"], $libri, true);
        } catch (Exception $e) {
            echo '<p>Non ci è stato possibile visualizzare i libri, perfavore riprova più tardi</p>';
            errlog($e, 'log/catalogo.log');
        }
        ?>
    </div>
</div>
<?php require 'componenti/footer.php'; ?>
