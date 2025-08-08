<?php

include("include/head.php");

if (!$_SESSION['is_connect'] == true) {
    header('Location: login.php');
}
if (!$_SESSION['niveau_admin'] == 3) {
    header('location: index.php');
}


$title = 'Editer une musique';
include("include/navbar.php");
include('include/functionDb.php');

//reprends le get['nom_musique] et dissocie le nom auteur pour garder que le nom musique
function nomMusique($nom)
{
    $explo = (explode(':', $nom));
    $result =  $explo[0];
    return $result;
}
// if données chargées acces au change
if (isset($_POST["new_nom"])) {
    $id = $_GET['id_musique'];
    $nom = $_GET['new_nom'];
    $auteur = $_GET['new_auteur'];
    $date_publication = $_GET['new_date_publication'];
    $album = $_GET['new_album'];
    $duree = $_GET['new_duree'];
    $categorie = $_GET['categorie'];

    updateMusique($pdo, $id, $nom, $auteur, $date_publication, $album, $duree, $categorie);
    echo "Changement reussis";
}
?>

<style>
    .content {
        width: 80%;
        height: 400px;
        margin-bottom: 50px;
        margin-top: 70px;
        border: 1px solid black;


        background-color: #F5F5F5;
        border-radius: 20px;
        box-shadow: 0 20px 20px;
        
        display: flex;
        gap: 30px;
        flex-direction: column;
        align-items: center;
        justify-content: start;
    }

    table tr td {
        border: 1px solid black;
    }
</style>


<body>

    <div class="content">
        <h2>Modifier une musique</h2>

        <form action="edit-musique.php" methode="post">
            <?php include("include/html_select_musique.php") ?>
            <input type="submit" value="Chercher">
        </form>



        <?php
        if (isset($_GET['nom_musique']) || isset($_GET['id_musique'])) {
            $nom =  nomMusique($_GET['nom_musique']);
            $data = dataMusique($pdo, $nom);
        ?>
            <table>
                <tr>
                    <td>Nom</td>
                    <td>Auteur</td>
                    <td>date de publication</td>
                    <td>Album</td>
                    <td>duree</td>
                    <td>categorie id</td>
                </tr>

                <form action="edit-musique.php" methode="post">
                    <tr>
                        <input type="hidden" name="nom_musique" value="<?= $data[0]['nom'] ?>">
                        <input type="hidden" name="id_musique" value="<?= $data[0]['id_musique'] ?>">
                        <td><input type="text" name="new_nom" value="<?= $data[0]['nom'] ?>"></td>
                        <td><input type="text" name="new_auteur" value="<?= $data[0]['auteur'] ?>"></td>
                        <td><input type="text" name="new_date_publication" value="<?= $data[0]['date_publication'] ?>"></td>
                        <td><input type="text" name="new_album" value="<?= $data[0]['album'] ?>"></td>
                        <td><input type="text" name="new_duree" value="<?= $data[0]['duree'] ?>"></td>
                        <td><?php include('include/html_select_genre.php') ?> </td>
                    </tr>
                    <input type="submit" value="Appliquer les mdifications">
                </form>
            <?php
        }
            ?>
            </table>
    </div>


    <?php include("include/footer.php") ?>
</body>

</html>