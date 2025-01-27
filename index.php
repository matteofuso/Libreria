<?php
$nav_page = 'Home';
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
    <title>Libreria - Homepage</title>
</head>
<body class="d-flex flex-column">
    <?php include 'componenti/header.php'; ?>

    <main class="flex-grow-1">
        <section class="hero">
            <div class="overlay">
                <h1>La libreria</h1>
                <p class="mx-3">Esplora il nostro ampio catalogo di libri e trova la tua lettura ideale!</p>
            </div>
        </section>

        <section class="my-5">
            <div class="container">
                <h2>Benvenuti nella nostra libreria!</h2>
                <p>
                    Nel nostro catalogo troverai libri di ogni genere, dai classici senza tempo alle ultime novità. Esplora le nostre categorie e trova il libro che fa per te.<br>
                    Abbiamo anche una sezione di consigli per la lettura, offerte speciali e una community di lettori appassionati. Scopri tutte le nostre novità!
                </p>
            </div>
        </section>

        <section class="my-5">
            <div class="container">
                <h2>Domande Frequenti (FAQ)</h2>
                <div class="accordion" id="accordionFAQ">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Come posso acquistare un libro?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                Puoi acquistare i nostri libri direttamente online attraverso il nostro sito web oppure venire a trovarci in libreria.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Quali generi di libri avete?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                Offriamo una vasta selezione che include narrativa, saggistica, libri per bambini, romanzi, e molto altro. Controlla il nostro catalogo per tutte le opzioni!
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Come posso prenotare un libro?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                Puoi prenotare un libro direttamente sul nostro sito web oppure telefonicamente.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'componenti/footer.php'; ?>
    <script src="scripts/colormode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>
</html>