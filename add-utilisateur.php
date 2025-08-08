<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include('include/functionDb.php');
include('include/head.php');
$title = 'Creer un compte utilisateur';

if (count($_POST) > 0) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $nom_utilisateur = $_POST["nom_utilisateur"];
    $mdp = $_POST["mdp"];
    $hash = password_hash($mdp, PASSWORD_BCRYPT);
    $date = date('d.m.Y', time());

    addUtilisateur($nom, $prenom, $age, $email, $preference, $date, $hash, $nom_utilisateur, $pdo);
}
?>

<style>
    body {
        background: linear-gradient(#1AFAF5, #446666)
    }

    .content {
        background-color: white;
        box-shadow: 0px 15px 30px black;
        border: 1px solid #323C3C;
        border-radius: 40px;
        margin-top:50px
    }

    form {
        padding: 10px 40px;
        border: 1px solid black;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;

        font-size: 1.2em;

        border: none;
    }


    button {
        margin-top: 15px;
        width: 120px;
        height: 40px;
        border-radius: 20px;
        color: #446666;
        background-color: #3FBCBD;
    }

    button:hover {
        background-color: #499191;

    }

    label {
        margin-top: 10px
    }

    input{
        width: 280px;
    }
</style>

<body>
    <div class="content">
        <form action="add-utilisateur.php" method="post">
            <label for="email">Email :</label>
            <input required type="email" name="email">

            <label for="nom">Nom :</label>
            <input type="text" name="nom">

            <label for="prenom">Prenom :</label>
            <input type="text" name="prenom">

            <label for="age">Age :</label>
            <input type="number" name="age">

            <label for="nom_utilisateur">Nom utilisateur :</label>
            <input type="text" name="nom_utilisateur">

            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp">

            <label for="confirm_mdp">Confirmer mot de passe :</label>
            <input type="password" name="confirm_mdp">


            <button class="btn-confirmer" type="submit">Confirmer</button>

            <button class="btn-retour" type="button" onclick="location.href='login.php'">Retour</button>

        </form>
    </div>
    <?php include("include/footer.php") ?>
</body>

</html>