<?php
include 'connect.php';
include 'query.php';
/**@var $db */

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['resource'])){
        var_dump($_POST);
        $resource = $_POST['resource'];
        $id = $_POST['id'];
        if ($resource == 'libri' || $resource == 'autori' || $resource == 'generi'){
            $code = match($resource){
                'libri' => 1,
                'autori' => 2,
                'generi' => 3,
            };
            try {
                query($db, 'delete from '. $resource .' where id = :id', [':id' => $id]);
                $succCode = $code;
                header("Location: ../modifica.php?succ=$succCode");
            } catch (Exception $e) {
                errlog($e, '../log/delete.log');
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