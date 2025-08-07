<?php
$config = require __DIR__ . '/config.php';
$dsn = $condif['dsn'];
$user = $config["user"];
$pass = $config["password"];
$pdo = new \PDO($dsn, $user, $pass);


$lettre = $_GET["lettre"];
$lettre = "%" . $lettre . "%";
$resultat = inputSearch($pdo, $lettre);

echo json_encode($resultat);


function inputSearch($pdo, $lettre)
{
    $sql = "SELECT nom,auteur FROM musique WHERE nom LIKE :lettre ";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':lettre', $lettre, PDO::PARAM_STR);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
