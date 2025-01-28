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
        $query = 'select l.id as "#", l.titolo, a.nome as autore, g.genere, concat(l.prezzo, " €") as prezzo, l.anno_pubblicazione from libri l join autori a on a.id = l.autore join generi g on g.id = l.genere order by l.id asc;';
        try {
            $libri = select($db, $query);
            printTable($libri);
        } catch (Exception $e) {
            echo '<p>Non ci è stato possibile visualizzare i libri, perfavore riprova più tardi</p>';
            errlog($e, 'log/catalogo.log');
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Autori</h3>
            <p>Visualizza la lista di tutti gli autori presenti in catalogo</p>
            <?php
                $query = 'select a.id as "#", a.nome from autori a;';
                try {
                    $autori = select($db, $query);
                    printTable($autori);
                } catch (Exception $e) {
                    echo '<p>Non ci è stato possibile visualizzare gli autori, perfavore riprova più tardi</p>';
                    errlog($e, 'log/catalogo.log');
                }
            ?>
        </div>
        <div class="col-md-6">
            <h3>Generi</h3>
            <p>Visualizza la lista di tutti i generi presenti in catalogo</p>
            <?php
                $query = 'select g.id as "#", g.genere from generi g;';
                try {
                    $generi = select($db, $query);
                    printTable($generi);
                } catch (Exception $e) {
                    echo '<p>Non ci è stato possibile visualizzare i generi, perfavore riprova più tardi</p>';
                    errlog($e, 'log/catalogo.log');
                }
            ?>
        </div>
    </div>
<?php require 'componenti/footer.php'; ?>
