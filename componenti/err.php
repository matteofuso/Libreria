<?php

if (isset($_GET['err'])) {
    $errors = [
        '-1' => 'Errore generico',
        '0' => 'Impossibile connettersi al database',
        '1' => 'Errore nell\'inserimento del genere',
        '2' => 'Errore nell\'inserimento dell\'autore',
        '3' => 'Errore nell\'inserimento del libro'
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