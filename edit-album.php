<?php

if (!$_SESSION['is_connect'] == true) {
    header('Location: login.php');
}
if (!$_SESSION['niveau_admin'] == 3) {
    header('location: index.php');
}

$title = 'Editer un album';
include("include/head.php");
include("include/navbar.php");
include('include/functionDb.php');


//si on le nouveau titre
if (isset($_POST['new_titre'])) {
    $id_album = $_POST['id_album'];
    $new_titre = $_POST['new_titre'];
    $auteur = $_POST['new_auteur'];
    $categorie_id = $_POST['categorie'];
    $date_publication = $_POST['new_date_publication'];
    $nombre_piste = $_POST['new_nombre_piste'];
    $image = $_POST['new_image'];

    updateAlbum($pdo, $id_album, $new_titre, $auteur, $categorie_id, $date_publication, $nombre_piste, $image);
}


// si on a l'input du titre de l'album affiche ses données de la DB dans un tableau
if (isset($_POST['titre_album'])) {

    //fonction qui va chercher les données
    $data_album = dataAlbum($pdo, $_POST['titre_album']);
    //variable pour stocker les données
    $id_album = $data_album[0]["id_album"];
    $titre = $data_album[0]["titre"];
    $auteur = $data_album[0]["auteur"];
    $categorie_id = $data_album[0]["categorie_id"];
    $date_publication = $data_album[0]["date_publication"];
    $nombre_piste = $data_album[0]["nombre_piste"];
    $image = $data_album[0]["image"];
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

        display: flex;
        gap: 30px;
        flex-direction: column;
        align-items: center;
        justify-content: start;
    }

    table tr td {
        border: 1px solid black;
    }

    select {
        width: 300px;
    }
</style>



<body>


    <div class="content">
        <h2>Editer un album</h2>
        <form action="edit-album.php" method="post">
            <select name="titre_album">
                <?php
                $data_search = searchAlbum($pdo);
                // liste deroulante avec tout les noms d'album
                for ($i = 0; $i < count($data_search); $i++) {
                    echo "<option for='titre_album' value='" . $data_search[$i]['titre'] . "'>" . $data_search[$i]['titre'] . "</option>";
                }
                ?>
            </select>
            <button type="submit">Chercher</button>
        </form>



        <?php
        if (isset($_POST["titre_album"])) {
        ?>
            <form action="edit-album.php" method="post">
                <table>
                    <thead>
                        <tr>
                            <td>Titre</td>
                            <td>Auteur</td>
                            <td>Categorie_id</td>
                            <td>publication</td>
                            <td>Nombre de piste</td>
                            <td>Image</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <input type="hidden" name="id_album" value=" <?= $id_album ?> ">
                            <td><input type="text" name="new_titre" value="<?= $titre ?>"></td>
                            <td><input type="text" name="new_auteur" value="<?= $auteur ?>"></td>
                            <td><?php include("include/html_select_genre.php") ?></td>
                            <td><input type="text" name="new_date_publication" value="<?= $date_publication ?>"></td>
                            <td><input type="text" name="new_nombre_piste" value="<?= $nombre_piste ?>"></td>
                            <td><input type="text" name="new_image" value="<?= $image ?>"></td>

                        </tr>
                        <button type="submit">Appliquer les modifications</button>

                    </tbody>
                </table>
            </form>
        <?php
        }
        ?>

    </div>

    <?php include("include/footer.php") ?>
</body>

</html>