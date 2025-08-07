<?php

$config = require __DIR__ . '/config.php';
$dsn = $condif['dsn'];
$user = $config["user"];
$pass = $config["password"];
$pdo = new \PDO($dsn, $user, $pass);

$id = $_POST["id"];
$return = supprimerMusique($pdo, $id);




echo json_encode($return);


function supprimerMusique($pdo, $id)
{
    $sql = 'DELETE FROM musique WHERE id_musique= :id';
    $stmt = $pdo->prepare($sql);
    $params = [
        'id' => $id,
    ];
    $stmt->execute($params);

    if ($stmt->execute($params)) {
        return true;
    } else {
        return false;
    }
}
