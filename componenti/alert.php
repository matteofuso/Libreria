<?php

if (!Database::isConnected())
{
    $_GET['err'] = '0';
}

if (isset($_GET['err'])) {
    $errors = [
        '-1' => 'Errore generico',
        '0' => 'Impossibile connettersi al database',
        '1' => 'Errore nell\'inserimento del genere',
        '2' => 'Errore nell\'inserimento dell\'autore',
        '3' => 'Errore nell\'inserimento del libro',
        '4' => 'Errore nell\'eliminazione del libro',
        '5' => 'Errore nell\'eliminazione dell\'autore, controlla che non ci siano libri associati',
        '6' => 'Errore nell\'eliminazione del genere, controlla che non ci siano libri associati',
        '7' => 'Libro già presente in catalogo',
        '8' => 'Errore nella modifica del libro',
        '9' => 'Errore nella modifica dell\'autore',
        '10' => 'Errore nella modifica del genere',
    ];
    $err = $_GET['err'];
    if (!array_key_exists($err, $errors)) {
        $err = '-1';
    }
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
          <p class='flex-grow-1 my-0 align-baseline'><i class='bi bi-exclamation-triangle me-2'></i>$errors[$err]</p>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}

if (isset($_GET['succ'])){
    $successes = [
        '-1' => 'Operazione completata con successo',
        '0' => 'Libro inserito con successo',
        '1' => 'Libro eliminato con successo',
        '2' => 'Autore eliminato con successo',
        '3' => 'Genere eliminato con successo',
        '4' => 'Libro modificato con successo',
        '5' => 'Autore modificato con successo',
        '6' => 'Genere modificato con successo',
    ];
    $succ = $_GET['succ'];
    if (!array_key_exists($succ, $successes)) {
        $succ = '-1';
    }
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
          <p class='flex-grow-1 my-0 align-baseline'><i class='bi bi-check-circle me-2'></i>$successes[$succ]</p>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}