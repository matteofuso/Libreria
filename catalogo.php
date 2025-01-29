<?php
include 'database/connect.php';
include "database/query.php";
include 'database/printTable.php';
$nav_page = 'Catalogo';
$main_classes = 'container my-4';
/**@var $db */
?>
<?php require 'componenti/header.php'; ?>
<?php include 'componenti/alert.php'; ?>
    <div>
        <h1>Libri</h1>
        <p>Visualizza la lista di tutti i libri in catalogo</p>
        <?php
        $query = 'select l.id, l.titolo, a.nome, g.genere, concat(l.prezzo, " €") as price, l.anno_pubblicazione from libri l join autori a on a.id = l.autore join generi g on g.id = l.genere order by l.id asc;';
        try {
            $libri = select($db, $query);
            printTable(["#", "Titolo", "Autore", "Genere", "Prezzo", "Anno di Pubblicazione"], $libri);
        } catch (Exception $e) {
            echo '<p>Non ci è stato possibile visualizzare i libri, perfavore riprova più tardi</p>';
            errlog($e, 'log/catalogo.log');
        }
        ?>
    </div>
<?php require 'componenti/footer.php'; ?>
