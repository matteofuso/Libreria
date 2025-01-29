<div class="row">
    <div class="mb-3 col-md-6">
        <label for="title" class="form-label">Nome del libro</label>
        <input type="text" class="form-control" id="title" name="title"
               placeholder="Il signore degli Anelli" required>
    </div>
    <div class="mb-3 col-md-6">
        <label for="genre" class="form-label">Genere del libro</label>
        <select name="genre" id="genre" class="form-select form-select-insert"
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
        <input type="text" class="form-control" id="new-genre" name="new-genre"
               placeholder="Fantasy">
    </div>
    <div class="mb-3 col-md-6">
        <label for="price" class="form-label">Prezzo del libro</label>
        <div class="input-group">
            <div class="input-group-text">€</div>
            <input name="price" type="number" class="form-control" id="price"
                   placeholder="19.99"
                   step="0.01" required>
        </div>
    </div>
    <div class="mb-3 col-md-6">
        <label for="author" class="form-label">Autore del libro</label>
        <select name="author" id="author" class="form-select form-select-insert"
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
        <input type="text" class="form-control" id="new-author" name="new-author"
               placeholder="J.K. Rowling">
    </div>
    <div class="mb-3 col-md-6">
        <label for="year" class="form-label">Anno di pubblicazione</label>
        <input name="year" type="number" class="form-control" id="year" placeholder="2023"
               required>
    </div>
</div>