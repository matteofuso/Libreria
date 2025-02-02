<?php
include "../functions/Database.php";
include "../functions/Log.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (Database::connect() == null) {
        header("Location: ../modifica.php?err=0");
        exit();
    }

    if (!isset($_POST['resource'])) {
        http_response_code(400);
        exit();
    }
    $resource = $_POST['resource'];
    $id = $_POST['id'] ?? '';

    if ($resource === '' || $id === '') {
        http_response_code(400);
        exit();
    }

    $code = match ($resource) {
        'libri' => 0,
        'autori' => 1,
        'generi' => 2,
    };

    if ($resource == 'libri') {
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
            Log::errlog($e, '../log/modifica.log');
            header('Location: ../modifica.php?err=1');
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
            Log::errlog($e, '../log/modifica.log');
            header('Location: ../modifica.php?err=2');
            exit();
        }

        try {
            Database::query('update libri set titolo = :titolo, autore = :autore, genere = :genere, prezzo = :prezzo, anno_pubblicazione = :anno_pubblicazione where id = :id;', [
                ':titolo' => $title,
                ':autore' => $author,
                ':genere' => $genre,
                ':prezzo' => $price,
                ':anno_pubblicazione' => $year,
                ':id' => $id
            ]);
        } catch (Exception $e) {
            Log::errlog($e, '../log/modifica.log');
            header('Location: ../modifica.php?err=8');
            exit();
        }
        header('Location: ../modifica.php?succ=4');

    } else if ($resource == 'autori' || $resource == 'generi') {

        $newResource = $_POST['new-resource'] ?? '';
        if ($newResource == '') {
            http_response_code(400);
            exit();
        }

        try {
            $query = match ($resource) {
                'autori' => "update autori set nome = :newresource where id = :id",
                'generi' => "update generi set genere = :newresource where id = :id",
            };
            Database::query($query, [
                ":newresource" => $newResource,
                ":id" => $id
            ]);
            header('Location: ../modifica.php?succ=' . $code + 4);
        } catch (Exception $e) {
            Log::errlog($e, '../log/modifica.log');
            header('Location: ../modifica.php?err=' . $code + 8);
        }
    }
} else {
    http_response_code(405);
}