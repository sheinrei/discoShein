<?php

$config = require __DIR__ . '/config.php';
$dsn = $condif['dsn'];
$user = $config["user"];
$pass = $config["password"];
$pdo = new \PDO($dsn, $user, $pass);

$id = $_POST["id"];
$return = supprimerAlbum($pdo, $id);




echo json_encode($return);


function supprimerAlbum($pdo, $id)
{
    $sql = 'DELETE FROM album WHERE id_album = :id';
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
