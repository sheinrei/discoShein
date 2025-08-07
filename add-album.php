<?php

if (!$_SESSION['is_connect'] == true) {
    header('Location: login.php');
}
if (!$_SESSION['niveau_admin'] == 3) {
    header('location: index.php');
}

$title = "Ajouter album";
include('include/head.php');
include('include/navbar.php');
include('include/functionDb.php');





if (count($_POST) > 0) {
    $titre = $_POST["titre"];
    $auteur = $_POST["auteur"];
    $categorie = $_POST["categorie"];
    $date_publication = $_POST["date_publication"];
    $nombre_piste = $_POST["nombre_piste"];
    $images = $_POST["images"];

    addAlbum($pdo, $titre, $auteur, $categorie, $date_publication, $nombre_piste, $images);
}

?>
<style>
    <?= include("include/form-admin.css")?>
</style>


<body>
    <div class="content">
        <form action="add-album.php" method="post">
            <h2>Ajouter un album</h2>

            <label for="titre">Titre</label>
            <input required type="text" name="titre">

            <label for="auteur">Auteur</label>
            <input required type="text" name="auteur">

            <label for="categorie">Categorie</label>
                <?php
                    include('include/html_select_genre.php')
                ?>
    

            </select>

            <label for="date_publication">Date de publication</label>
            <input required type="text" name="date_publication" placeholder="YYYY-MM-DD">

            <label for="nombre_piste">Nombre de piste</label>
            <input required type="text" name="nombre_piste">

            <label for="images">Image</label>
            <input  type="text" name="images">

            <input type="submit">
        </form>
    </div>
    <?php include("include/footer.php") ?>
</body>