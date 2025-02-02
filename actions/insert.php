<?php
include "../functions/Database.php";
include_once "../functions/Log.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $new_genre = trim($_POST['new-genre'] ?? '');
    $price = trim($_POST['price'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $new_author = trim($_POST['new-author'] ?? '');
    $year = trim($_POST['year'] ?? '');

    if (empty($title) || empty($genre) || empty($price) || empty($author) || empty($year) || ($author === '-1' && empty($new_author)) || ($genre === '-1' && empty($new_genre))) {
        http_response_code(400);
        exit();
    }

    if (Database::connect() == null)
    {
        header("Location: ../inserisci.php?err=0");
        exit();
    }

    try {
        if(Database::select('select * from libri where titolo = :titolo and autore = :autore and genere = :genere and anno_pubblicazione = :anno_pubblicazione', [
            ':titolo' => $title,
            ':autore' => $author,
            ':genere' => $genre,
            ':anno_pubblicazione' => $year
        ])){
            header('Location: ../inserisci.php?err=7');
            exit();
        }
    } catch (Exception $e) {
        Log::errlog($e, '../log/inserisci.log');
        header('Location: ../inserisci.php?err=3');
        exit();
    }

    try {
        if ($genre === '-1') {
            $genres = Database::select('select * from generi where genere = :genere', [':genere' => $new_genre]);
            if ($genres) {
                $genre = $genres[0]->id;
            } else {
                Database::query('insert into generi (genere) values (:genere)', [':genere' => $new_genre]);
                $genre = Database::connect()->lastInsertId();
            }
        }
    } catch (Exception $e) {
        Log::errlog($e, '../log/inserisci.log');
        header('Location: ../inserisci.php?err=1');
        exit();
    }

    try {
        if ($author === '-1') {
            $authors = Database::select('select * from autori where nome = :nome', [':nome' => $new_author]);
            if ($authors) {
                $author = $authors[0]->id;
            } else {
                Database::query('insert into autori (nome) values (:nome)', [':nome' => $new_author]);
                $author = Database::connect()->lastInsertId();
            }
        }
    } catch (Exception $e) {
        Log::errlog($e, '../log/inserisci.log');
        header('Location: ../inserisci.php?err=2');
        exit();
    }

    try {
        Database::query('INSERT INTO libri (titolo, autore, genere, prezzo, anno_pubblicazione) VALUES (:titolo, :autore, :genere, :prezzo, :anno_pubblicazione)', [
            ':titolo' => $title,
            ':autore' => $author,
            ':genere' => $genre,
            ':prezzo' => $price,
            ':anno_pubblicazione' => $year
        ]);
    } catch (Exception $e) {
        Log::errlog($e, '../log/inserisci.log');
        header('Location: ../inserisci.php?err=3');
        exit();
    }
    header('Location: ../catalogo.php?succ=0');
} else {
    if (isset($_GET['err'])) {
        header("Location: ../inserisci.php?err=$_GET[err]");
    } else {
        http_response_code(405);
    }
}