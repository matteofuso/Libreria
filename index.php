<?php $title = "Homepage"; $main_classes = ''; require 'componenti/header.php';?>
<section class="hero w-100">
    <div class="overlay">
        <h1>La libreria</h1>
        <p class="mx-3">Esplora il nostro ampio catalogo di libri e trova la tua lettura ideale!</p>
    </div>
</section>
<section class="my-5">
    <div class="container">
        <h2>Benvenuti nella nostra libreria!</h2>
        <p>
            Nel nostro catalogo troverai libri di ogni genere, dai classici senza tempo alle ultime novità. Esplora
            le nostre categorie e trova il libro che fa per te.<br>
            Abbiamo anche una sezione di consigli per la lettura, offerte speciali e una community di lettori
            appassionati. Scopri tutte le nostre novità!
        </p>
    </div>
</section>
<section class="my-5">
    <div class="container">
        <h2>Domande Frequenti (FAQ)</h2>
        <div class="accordion" id="accordionFAQ">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Come posso acquistare un libro?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                     data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Puoi acquistare i nostri libri direttamente online attraverso il nostro sito web oppure
                        venire a trovarci in libreria.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Quali generi di libri avete?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                     data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Offriamo una vasta selezione che include narrativa, saggistica, libri per bambini, romanzi,
                        e molto altro. Controlla il nostro catalogo per tutte le opzioni!
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Come posso prenotare un libro?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                     data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Puoi prenotare un libro direttamente sul nostro sito web oppure telefonicamente.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require 'componenti/footer.php'; ?>
