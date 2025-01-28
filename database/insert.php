<?php
include 'connect.php';
include 'query.php';
/**@var $db */

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = trim($_POST['title']);
    $genre = trim($_POST['genre']);
    $new_genre = trim($_POST['new-genre']);
    $price = trim($_POST['price']);
    $author = trim($_POST['author']);
    $new_author = trim($_POST['new-author']);
    $year = trim($_POST['year']);

    if ($db === null){
        header('Location: ../inserisci.php?err=0');
        exit();
    }

    try {
        if ($genre === '-1'){
            if (select($db, 'select * from generi where genere = :genere', [':genere' => $new_genre])){
                $genre = select($db, 'select id from generi where genere = :genere', [':genere' => $new_genre])[0]->id;
            } else {
                query($db, 'insert into generi (genere) values (:genere)', [':genere' => $new_genre]);
                $genre = $db->lastInsertId();
            }
        }
    } catch (Exception $e) {
        errlog($e, '../log/inserisci.log');
        header('Location: ../inserisci.php?err=1');
        exit();
    }

    try {
        if ($author === '-1'){
            if (select($db, 'select * from autori where nome = :nome', [':nome' => $new_author])){
                $author = select($db, 'select id from autori where nome = :nome', [':nome' => $new_author])[0]->id;
            } else {
                query($db, 'insert into autori (nome) values (:nome)', [':nome' => $new_author]);
                $author = $db->lastInsertId();
            }
        }
    } catch (Exception $e) {
        errlog($e, '../log/inserisci.log');
        header('Location: ../inserisci.php?err=2');
        exit();
    }

    try {
        query($db, 'INSERT INTO libri (titolo, autore, genere, prezzo, anno_pubblicazione) VALUES (:titolo, :autore, :genere, :prezzo, :anno_pubblicazione)', [
            ':titolo' => $title,
            ':autore' => $author,
            ':genere' => $genre,
            ':prezzo' => $price,
            ':anno_pubblicazione' => $year
        ]);
    } catch (Exception $e) {
        errlog($e, '../log/inserisci.log');
        header('Location: ../inserisci.php?err=3');
        exit();
    }
    header('Location: ../catalogo.php?succ=0');
} else {
    if (isset($_GET['err'])){
        header("Location: ../inserisci.php?err=$_GET[err]");
    } else {
        http_response_code(405);
    }
}