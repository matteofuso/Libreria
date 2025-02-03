<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if (Database::connect($config) == null)
    {
        header("Location: ../modifica.php?err=0");
        exit();
    }

    if (isset($_POST['resource'])){
        $resource = $_POST['resource'];
        $id = $_POST['id'] ?? '';

        if ($resource === '' || $id === '') {
            http_response_code(400);
            exit();
        }

        if ($resource == 'libri' || $resource == 'autori' || $resource == 'generi'){
            $code = match($resource){
                'libri' => 1,
                'autori' => 2,
                'generi' => 3,
            };
            try {
                Database::query("delete from $resource where id = :id", [':id' => $id]);
                $succCode = $code;
                header("Location: ../modifica.php?succ=$succCode");
            } catch (Exception $e) {
                Log::errlog($e, '../log/delete.log');
                $errcode = 3 + $code;
                header("Location: ../modifica.php?err=$errcode");
            }
        } else {
            http_response_code(400);
        }
    }
} else {
    http_response_code(405);
}