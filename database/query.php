<?php
function select(?PDO $db, string $query, array $bind = []): array{
    if ($db === null){
        throw new Exception('Database connection is null');
    }
    $stm = $db->prepare($query);
    foreach ($bind as $key => $value){
        $stm->bindValue($key, $value);
    }
    $stm->execute();
    $result = $stm->fetchAll();
    return $result;
}

function query(?PDO $db, string $query, array $bind = []): void{
    if ($db === null){
        throw new Exception('Database connection is null');
    }
    $stm = $db->prepare($query);
    foreach ($bind as $key => $value){
        $stm->bindValue($key, $value);
    }
    $stm->execute();
}