<?php

if (!$_SESSION['is_connect'] == true) {
    header('Location: login.php');
}

$title = "index";
include('include/head.php');
include('include/navbar.php');

include("include/functionDb.php");



?>

<style>

    .content {
        background-color: #F5F5F5;
        width: 95%; 
        border-radius:20px;
        min-height: 50vh;
        text-align: center;
    }
</style>

<body>
    <div class="content">

        <h1>Retrouvez vos Album preférées</h1>

        <table id="myTable">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Titre</td>
                    <td>Auteur</td>
                    <td>Categorie</td>
                    <td>Date publication</td>
                    <td>nombre de piste</td>
                    <td>image</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $album = searchAlbum($pdo);

                for ($i = 0; $i < count($album); $i++) {
                    $data = dataAlbum($pdo, $album[$i]['titre']);

                ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><a href="detail-album.php"> <?= $data[0]['titre'] ?> </a> </td>
                        <td><?= $data[0]['auteur'] ?></td>
                        <td><?= $data[0]['categorie_id'] ?></td>
                        <td><?= $data[0]['date_publication'] ?></td>
                        <td><?= $data[0]['nombre_piste'] ?></td>
                        <td><?= $data[0]['image'] ?></td>
                    </tr>

                <?php } ?>
            </tbody>

        </table>
    </div>


    <?php include("include/footer.php") ?>
</body>

</html>