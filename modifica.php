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
        printTable(["#", "Titolo", "Nome", "Genere", "Prezzo", "Anno di Pubblicazione", "Azione"], $libri, [
                function($row) { return '<button class="btn btn-primary btn-sm d-inline-flex align-items-center me-2"><svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#edit"></use></svg></button>'; },
                function($row) { return '<button class="btn btn-danger btn-sm d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#deleteForm" onclick="deleteResource(\'libri\', '. $row->id . ')"><svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#delete"></use></svg></button>'; },
        ]);
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
            printTable(["#", "Nome", "Azione"], $libri, [
                function($row) { return '<button class="btn btn-primary btn-sm d-inline-flex align-items-center me-2"><svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#edit"></use></svg></button>'; },
                function($row) { return '<button class="btn btn-danger btn-sm d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#deleteForm" onclick="deleteResource(\'autori\', '. $row->id . ')"><svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#delete"></use></svg></button>'; },
        ]);
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
            printTable(["#", "Genere", "Azione"], $libri, [
                function($row) { return '<button class="btn btn-primary btn-sm d-inline-flex align-items-center me-2"><svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#edit"></use></svg></button>'; },
                function($row) { return '<button class="btn btn-danger btn-sm d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#deleteForm" onclick="deleteResource(\'generi\', '. $row->id . ')"><svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#delete"></use></svg></button>'; },
            ]);
        } catch (Exception $e) {
            echo '<p>Non ci è stato possibile visualizzare i libri, perfavore riprova più tardi</p>';
            errlog($e, 'log/catalogo.log');
        }
        ?>
    </div>
    <form method="post" action="database/delete.php?resource=libro" class="modal faded" id="deleteForm" tabindex="-1" aria-labelledby="deleteFormTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteFormTitle"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <p class="modal-body" id="deleteFormText"></p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input name="id" id="deleteFormId" type="hidden" value="">
                    <input name="resource" id="deleteFormResource" type="hidden" value="">
                    <button type="submin" class="btn btn-danger">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="scripts/modifica.js"></script>
<?php require 'componenti/footer.php'; ?>
