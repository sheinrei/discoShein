<?php
include('include/function-canConnect.php');

if (count($_POST) > 0) {
    
    if (canConnect($pdo, $_POST['mdp'], $_POST['email']) == true) {
        header('Location: index.php');
    } else {
        echo "Echec de la connexion.";
    }
}


$title = "Espace connexion";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ancizar+Serif:ital,wght@0,300..900;1,300..900&family=Jura:wght@300..700&family=Lisu+Bosa:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Markazi+Text:wght@400..700&display=swap" rel="stylesheet">

    <!-- import jquerry and dataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

    <!-- import bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <!-- mon css -->
    <link rel='stylesheet' href="style.css">
<style>
   * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Centrage de la page */
    body {
        background: linear-gradient(135deg, #2c3e50, #4ca1af);
    }

    /* Boîte de login */
    .login-container {
        background-color:rgb(255, 255, 255);
        padding: 2.5rem;
        border-radius: 12px;
        box-shadow: 0 10px 70px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        margin-top:50px;
    }

    /* Formulaire */

    .login-form input {
        width: 100%;
        padding: 0.75rem;
        margin-bottom: 1rem;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 1rem;
    }

    .btn_submit,.btn_add_compte {
        width: 100%;
        padding: 0.75rem;
        border: none;
        border-radius: 8px;
        background-color: #4ca1af;
        color: white;
        font-weight: bold;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 1s ease;
    }

    .btn_submit:hover,.btn_add_compte:hover {
        background-color:rgb(51, 125, 137);
    }

    .btn_add_compte {
        margin-top: 20px;
    } 

    footer{
        display: inherit;
    }

</style>


<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form class="login-form" action="login.php" method="post">
            <label for="email">Email : </label>
            <input required type="email" name="email"> <br>

            <label for="mdp">Password : </label>
            <input required type="text" name="mdp"> <br>

            <button class="btn_submit" type="submit">Connexion</button>

            <button class="btn_add_compte" type="button" onclick="location.href='add-utilisateur.php'">Créer un compte</button>


        </form>
    </div>

</body>

</html>