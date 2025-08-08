<?php
include('include/head.php');


if (!$_SESSION['is_connect'] == true) {
    header('Location: login.php');
}
if (!$_SESSION['niveau_admin'] == 3) {
    header('location: index.php');
}

$title = "Ajouter des musiques";
include('include/navbar.php');
include('include/functionDb.php');
$title = 'Ajouter une musique';


if (count($_POST) > 0) {
    $nom = $_POST["nom"];
    $auteur = $_POST["auteur"];
    $album = $_POST["album"];
    $duree = $_POST["duree"];
    $date_publication = $_POST["date_publication"];
    $categorie = $_POST["categorie"];

    addMusique($pdo, $nom, $auteur, $album, $duree, $date_publication, $categorie);
}
?>

<style>
<?php include("include/form-admin.css") ?>
</style>





<body>
    <div class="content">
        <form action="add-musique.php" method="post">
            <h2>Ajouter une musique</h2>

            <label for="nom">Nom</label>
            <input required type="text" name="nom">

            <label for="auteur">Auteur</label>
            <input required type="text" name="auteur">

            <label for="album">Album</label>
            <input required type="text" name="album">

            <label for="duree">Durée</label>
            <input required type="text" name="duree" placeholder="HH:MM:SS">

            <label for="date_publication">Date de sortie</label>
            <input required type="text" name="date_publication" placeholder="YYYY-MM-DD">

            <label for="categorie">Catégorie</label>
            <?php
            include("include/html_select_genre.php");
            ?>

            <input type="submit">
        </form>
    </div>
    <?php include("include/footer.php") ?>
</body>

</html>