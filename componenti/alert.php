<?php

if (isset($_GET['err'])) {
    $errors = [
        '-1' => 'Errore generico',
        '0' => 'Impossibile connettersi al database',
        '1' => 'Errore nell\'inserimento del genere',
        '2' => 'Errore nell\'inserimento dell\'autore',
        '3' => 'Errore nell\'inserimento del libro',
        '4' => 'Errore nell\'eliminazione del libro',
        '5' => 'Errore nell\'eliminazione dell\'autore, controlla che non ci siano libri associati',
        '6' => 'Errore nell\'eliminazione del genere, controlla che non ci siano libri associati'
    ];
    $err = $_GET['err'];
    if (!array_key_exists($err, $errors)) {
        $err = '-1';
    }
    echo "<div class='alert alert-danger alert-dismissible d-flex align-items-center' role='alert'>
          <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:'><path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/></svg>
          <div class='flex-grow-1'>$errors[$err]</div>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}

if (isset($_GET['succ'])){
    $successes = [
        '-1' => 'Operazione completata con successo',
        '0' => 'Libro inserito con successo',
        '1' => 'Libro eliminato con successo',
        '2' => 'Autore eliminato con successo',
        '3' => 'Genere eliminato con successo'
    ];
    $succ = $_GET['succ'];
    if (!array_key_exists($succ, $successes)) {
        $succ = '-1';
    }
    echo "<div class='alert alert-success alert-dismissible d-flex align-items-center' role='alert'>
          <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/></svg>
          <div class='flex-grow-1'>$successes[$succ]</div>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}