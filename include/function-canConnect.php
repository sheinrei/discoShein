<?php

include('include/functionDb.php');

//Fonction de connexion utilisateur
function canConnect($pdo, $mdp, $email){
    $sql = 'SELECT email,mdp,nom_utilisateur,niveau_admin FROM utilisateurs WHERE email = :email';
    $stmt = $pdo->prepare($sql);
    $stmt ->bindParam(':email',$email);
    $stmt ->execute();

    $result = $stmt->fetchAll();

    $verify_mdp = password_verify($mdp, $result[0]['mdp']);
    if ($verify_mdp == true){
        $_SESSION['niveau_admin'] = $result[0]['niveau_admin'];
        $_SESSION["nom_utilisateur"] = $result[0]["nom_utilisateur"];
        $_SESSION["is_connect"] = true;
        return true;
    }
    return false;
}
