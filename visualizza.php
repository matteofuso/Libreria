<?php
include 'database/connect.php';
include "database/query.php";
include 'database/printTable.php';
$nav_page = 'Visualizza';
?>

<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <title>Libreria - Visualizza</title>
</head>
<body class="d-flex flex-column">
<?php include 'componenti/header.php'; ?>

<main class="flex-grow-1 my-4 mx-3">
    <?php include 'componenti/err.php'; ?>
    <h1>Visualizzazione</h1>
    <p>Visualizza la lista di tutti i libri in catalogo</p>
    <?php
    $query = 'select l.id as "#", l.titolo, a.nome as autore, g.genere, l.prezzo, l.anno_pubblicazione from libri l join autori a on a.id = l.autore join generi g on g.id = l.genere;';
    try {
        $libri = select($db, $query);
        printTable($libri);
    } catch (Exception $e) {
        echo '<p>Non ci è stato possibile visualizzare i libri, perfavore riprova più tardi</p>';
        errlog($e, 'log/visualizza.log');
    }
    ?>
</main>

<?php include 'componenti/footer.php'; ?>
<script src="scripts/colormode.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>