<?php

include('include/head.php');
$title = "Espace connexion";



include('include/function-canConnect.php');

if (count($_POST) > 0) {
    
    if (canConnect($pdo, $_POST['mdp'], $_POST['email']) == true) {
        header('Location: index.php');
    } else {
        echo "Echec de la connexion.";
    }
}


?>


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