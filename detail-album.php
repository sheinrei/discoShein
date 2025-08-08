<?php

include("include/head.php");

if (!$_SESSION['is_connect'] == true) {
    header('Location: login.php');
}

$title = 'Detail d\'album';
include('include/navbar.php');
include('include/functionDb.php');


?>

<style>
    .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 95%;
        background-color: #F5F5F5;
        border-radius:20px;
        box-shadow: 0 20px 20px;
    }

    #myTable_wrapper{
        width: 70%;
    }
</style>




<body>
    <?php

    $_GET['album'] ?? $_GET['album'] = "Racine carrée";

    $album = $_GET['album'];
    $data = detailAlbum($pdo, $album);
    ?>

    <div class="content">
        <h1><?= $album ?> - <?= $data[0]['auteur'] ?></h1>
        <table id="myTable">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Auteur</td>
                    <td>Nom</td>
                    <td>Durée</td>
                    <td>Date de pulication</td>
                </tr>
            </thead>

            <tbody>
                <?php

                for ($i = 0; $i < count($data); $i++) {
                ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $data[$i]['auteur'] ?></td>
                        <td><?= $data[$i]['nom'] ?></td>
                        <td><?= $data[$i]['duree'] ?></td>
                        <td><?= $data[$i]['date_publication'] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>




    <?php include("include/footer.php") ?>
</body>

</html>