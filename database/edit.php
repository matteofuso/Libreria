<?php
include 'connect.php';
include 'query.php';
/**@var $db */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['resource'])) {
        $resource = $_POST['resource'] ?? '';
        $id = $_POST['id'] ?? '';

        if ($resource === '' || $id === '') {
            header('Location: ../modifica.php?err=9');
            exit();
        }

        if ($resource == 'libri') {
            $title = trim($_POST['title']) ?? '';
            $genre = trim($_POST['genre']) ?? '';
            $new_genre = trim($_POST['new-genre']) ?? '';
            $price = trim($_POST['price']) ?? '';
            $author = trim($_POST['author']) ?? '';
            $new_author = trim($_POST['new-author']) ?? '';
            $year = trim($_POST['year']) ?? '';

            if ($title === '' || $genre === '' || $price === '' || $author === '' || $year === '' || ($author === '-1' && $new_author === '') || ($genre === '1' && $new_genre === '')) {
                header('Location: ../inserisci.php?err=9');
                exit();
            }

            if ($db === null) {
                header('Location: ../modifica.php?err=0');
                exit();
            }

            try {
                if ($genre === '-1') {
                    if (select($db, 'select * from generi where genere = :genere', [':genere' => $new_genre])) {
                        $genre = select($db, 'select id from generi where genere = :genere', [':genere' => $new_genre])[0]->id;
                    } else {
                        query($db, 'insert into generi (genere) values (:genere)', [':genere' => $new_genre]);
                        $genre = $db->lastInsertId();
                    }
                }
            } catch (Exception $e) {
                errlog($e, '../log/modifica.log');
                header('Location: ../modifica.php?err=1');
                exit();
            }

            try {
                if ($author === '-1') {
                    if (select($db, 'select * from autori where nome = :nome', [':nome' => $new_author])) {
                        $author = select($db, 'select id from autori where nome = :nome', [':nome' => $new_author])[0]->id;
                    } else {
                        query($db, 'insert into autori (nome) values (:nome)', [':nome' => $new_author]);
                        $author = $db->lastInsertId();
                    }
                }
            } catch (Exception $e) {
                errlog($e, '../log/modifica.log');
                header('Location: ../modifica.php?err=2');
                exit();
            }

            try {
                query($db, 'update libri set titolo = :titolo, autore = :autore, genere = :genere, prezzo = :prezzo, anno_pubblicazione = :anno_pubblicazione where id = :id;', [
                    ':titolo' => $title,
                    ':autore' => $author,
                    ':genere' => $genre,
                    ':prezzo' => $price,
                    ':anno_pubblicazione' => $year,
                    ':id' => $id
                ]);
            } catch (Exception $e) {
                errlog($e, '../log/modifica.log');
                header('Location: ../modifica.php?err=8');
                exit();
            }
            header('Location: ../modifica.php?succ=4');
        } else if ($resource == 'autori') {
            echo 'autori';
        } else if ($resource == 'generi') {
            echo 'generi';
        } else {
            http_response_code(400);
        }
    }
} else {
    http_response_code(405);
}