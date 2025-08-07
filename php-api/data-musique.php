<?php

$config = require __DIR__ . '/config.php';
$dsn = $condif['dsn'];
$user = $config["user"];
$pass = $config["password"];
$pdo = new \PDO($dsn, $user, $pass);

$titre = $_GET["titre"];
$auteur = $_GET["auteur"];


$resultat = dataMusique($pdo,$titre,$auteur );
echo json_encode($resultat); 


function dataMusique($pdo, $nom_musique, $auteur)
{
    $sql = 'SELECT id_musique,nom,auteur,date_publication, album, duree, categorie_id FROM musique 
    WHERE nom = :nom_musique AND auteur = :auteur';
    $stmt = $pdo->prepare($sql);
    $params = [
        'nom_musique' => $nom_musique,
        'auteur' => $auteur
    ];
    $stmt->execute($params);
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

