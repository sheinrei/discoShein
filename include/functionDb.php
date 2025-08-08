<?php

$config = require __DIR__ . '/../php-api/config.php';

$dsn = $config['dsn'];
$user =  $config['user'];
$pass =  $config['password'];
$pdo = new \PDO($dsn, $user, $pass);



// Ajouter un nouvel utilisateur
function addUtilisateur($nom, $prenom, $age, $email, $preference, $date, $mdp, $nom_utilisateur, $pdo)
{
    $sql = "INSERT INTO utilisateurs (nom,prenom,age,email,preference_categorie,date_creation, mdp, nom_utilisateur) 
    VALUES (:nom, :prenom, :age, :email, :preference, :date, :mdp, :nom_utilisateur)";

    $params = [
        'nom' => $nom,
        'prenom' => $prenom,
        'age' => $age,
        'email' => $email,
        'preference' => $preference,
        'date' => $date,
        'mdp' => $mdp,
        "nom_utilisateur" => $nom_utilisateur
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    header('Location: login.php');
}



//function sur les albums

//ajouter un nouvel album
function addAlbum($pdo, $titre, $auteur, $categorie, $date_publication, $nombre_piste, $images)
{
    $sql = "INSERT INTO album ( titre, auteur, categorie_id, date_publication, nombre_piste, image) 
    VALUES (:titre, :auteur, :categorie_id, :date_publication, :nombre_piste, :images)";

    $params = [
        'titre' => $titre,
        'auteur' => $auteur,
        'categorie_id' => $categorie,
        'date_publication' => $date_publication,
        'nombre_piste' => $nombre_piste,
        'images' => $images
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
}

//cherche titre de tout les albums dans la base de donnée pour les mettre dans <option> de <select>
function searchAlbum($pdo)
{
    $sql = "SELECT titre FROM album ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

//fonction pour chercher les donnnées d'un album choisi par input <select>
function dataAlbum($pdo, $titre)
{
    $sql = "SELECT id_album,titre,auteur,categorie_id,date_publication,nombre_piste, image FROM album WHERE titre = :titre";
    $stmt = $pdo->prepare($sql);
    $params = [
        'titre' => $titre
    ];
    $stmt->execute($params);
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

//Donnée d'un album
function detailAlbum($pdo, $album)
{
    $sql = 'SELECT auteur,nom,duree,date_publication FROM musique WHERE album = :album';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':album', $album);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

//fonction qui va changer les données de la DB album
function updateAlbum($pdo, $id_album, $new_titre, $auteur, $categorie_id, $date_publication, $nombre_piste, $image)
{
    $sql = 'UPDATE album 
    SET titre = :new_titre,
     auteur = :auteur,
     date_publication = :date_publication,
     categorie_id = :categorie_id,
     nombre_piste = :nombre_piste,
     image = :image
       WHERE album.id_album = :id_album
       ';



    $stmt = $pdo->prepare($sql);
    $params = [
        'id_album' => $id_album,
        'new_titre' => $new_titre,
        'auteur' => $auteur,
        'date_publication' => $date_publication,
        'categorie_id' => $categorie_id,
        'nombre_piste' => $nombre_piste,
        'image' => $image
    ];
    $stmt->execute($params);

        if ($stmt->execute($params)) {
        echo 'Changement effectué';
    } else {
        echo 'Erreur : Changement non effectué';
    }
}

//function pour supprimer un album de la database
function deleatAlbum($pdo,$id){
    $sql= "DELETE FROM album WHERE album.id_album = :id";
    $params = [
        'id' => $id
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
}




// function sur les musiques
// donnée d'une musique
function dataMusiqueJoinCategorie($pdo)
{
    $sql = 'SELECT nom,auteur,duree,album,C.categorie 
    FROM musique M 
    INNER JOIN categorie_musique C ON C.id_categorie_musique = M.categorie_id;';

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

function dataMusique($pdo, $nom_musique)
{
    $sql = 'SELECT id_musique,nom,auteur,date_publication, album, duree, categorie_id FROM musique WHERE nom = :nom_musique';
    $stmt = $pdo->prepare($sql);
    $params = [
        'nom_musique' => $nom_musique
    ];
    $stmt->execute($params);
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

// Modifier données db d'une musique
function updateMusique($pdo, $id_musique, $new_titre, $new_auteur, $new_date_publication, $new_album, $new_duree, $new_categorie_id)
{
    $sql = 'UPDATE musique
    SET nom = :titre,
     auteur = :auteur,
     date_publication = :date_publication,
     album = :album,
     duree = :duree,
     categorie_id = :categorie_id
       WHERE musique.id_musique = :id_musique
       ';
    $stmt = $pdo->prepare($sql);
    $params = [
        'id_musique' => $id_musique,
        'titre' => $new_titre,
        'auteur' => $new_auteur,
        'date_publication' => $new_date_publication,
        'album' => $new_album,
        'categorie_id' => $new_categorie_id,
        'duree' => $new_duree,

    ];
    $stmt->execute($params);
    if ($stmt->execute($params)) {
        echo 'Changement effectué';
    } else {
        echo 'Erreur : Changement non effectué';
    }
}

// Ajouter une nouvelle musique
function addMusique($pdo, $nom, $auteur, $album, $duree, $date_publication, $categorie)
{

    $sql = "INSERT INTO musique (nom,auteur,album,duree,date_publication,categorie_id) 
    VALUES (:nom, :auteur, :album, :duree, :date_publication, :categorie)";

    $params = [
        'nom' => $nom,
        'auteur' => $auteur,
        'album' => $album,
        'duree' => $duree,
        'date_publication' => $date_publication,
        'categorie' => $categorie
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
}

function deleatMusique($pdo,$id){
    $sql= "DELETE FROM musique WHERE musique.id_musique = :id";
    $params = [
        'id' => $id
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
}
