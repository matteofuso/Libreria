<?php
include 'database/connect.php';
include 'database/query.php';
$nav_page = 'Inserisci';
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
    <title>Libreria - Inserisci</title>
</head>
<body class="d-flex flex-column">
<?php include 'componenti/header.php'; ?>

<main class="flex-grow-1 my-4 mx-3">
    <?php include 'componenti/err.php';?>
    <form method="post" action="database/insert.php" class="px-4">
        <h1>Inserimento</h1>
        <p>Inserisci i dati necessari ad aggiungere il libro</p>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="title" class="form-label">Nome del libro</label>
                <input type="text" class="form-control form-control-lg" id="title" name="title"
                       placeholder="Il signore degli Anelli" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="genre" class="form-label">Genere del libro</label>
                <select name="genre" id="genre" class="form-select form-select-lg form-select-insert"
                        data-insert-target="new-genre" required>
                    <option value="" selected disabled hidden class="text-secondary">Seleziona il genere</option>
                    <?php
                    try {
                        $generi = select($db, 'select * from generi;');
                        foreach ($generi as $genere) {
                            echo "<option value=\"$genere->id\">$genere->genere</option>";
                        }
                    } catch (Exception $e) {
                        errlog($e, 'log/inserisci.log');
                    }
                    ?>
                    <option value="-1">Inserisci un'altro genere...</option>
                </select>
            </div>
            <div class="mb-3 col-md-6 d-none">
                <label for="new-genre" class="form-label">Inserisci il nuovo genere</label>
                <input type="text" class="form-control form-control-lg" id="new-genre" name="new-genre"
                       placeholder="Fantasy">
            </div>
            <div class="mb-3 col-md-6">
                <label for="price" class="form-label">Prezzo del libro</label>
                <div class="input-group">
                    <div class="input-group-text">€</div>
                    <input name="price" type="number" class="form-control form-control-lg" id="price" placeholder="19.99"
                           step="0.01" required>
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="author" class="form-label">Autore del libro</label>
                <select name="author" id="author" class="form-select form-select-lg form-select-insert"
                        data-insert-target="new-author" required>
                    <option value="" selected disabled hidden class="text-secondary">Seleziona l'autore</option>
                    <?php
                    try {
                        $generi = select($db, 'select * from autori;');
                        foreach ($generi as $genere) {
                            echo "<option value=\"$genere->id\">$genere->nome</option>";
                        }
                    } catch (Exception $e) {
                        errlog($e, 'log/inserisci.log');
                    }
                    ?>
                    <option value="-1">Inserisci un'altro autore...</option>
                </select>
            </div>
            <div class="mb-3 col-md-6 d-none">
                <label for="new-author" class="form-label">Inserisci il nuovo autore</label>
                <input type="text" class="form-control form-control-lg" id="new-author" name="new-author"
                       placeholder="J.K. Rowling">
            </div>
            <div class="mb-3 col-md-6">
                <label for="year" class="form-label">Anno di pubblicazione</label>
                <input name="year" type="number" class="form-control form-control-lg" id="year" placeholder="2023"
                       required>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Inserisci il libro">
    </form>
</main>

<?php include 'componenti/footer.php'; ?>
<script src="scripts/colormode.js"></script>
<script src="scripts/form.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>