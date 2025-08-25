<?php
include('include/head.php');


$title = "index";
include('include/navbar.php');
include("include/functionDb.php");


?>

<style>
    .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .content_intro {
        margin-top: 50px;
        margin-bottom: 100px;
        text-align: center;
        width: 70%;
        color: black;
        border-radius: 10px;
    }

    .content_table {
        width: 95%;
        border-radius:20px;
        
    }

    .content_intro,
    .content_table {
        background-color: #F5F5F5;
    }



    #myTable_wrapper {
        padding-top: 20px;

    }
</style>

<body>
    <div class="content">
        <h2>Bienvenueeeeeeeeeeeee teste <?= $_SESSION['nom_utilisateur'] ?></h2>


        <div class="content_intro">
            <h1>Retrouvez vos musiques preférées</h1>
            <p>Plongez au cœur de l’univers musical avec Discographix, votre source incontournable pour découvrir,
                explorer et apprécier les discographies complètes de vos artistes préférés. Que vous soyez fan de rock,
                pop, jazz ou hip-hop, notre site vous offre un accès facile et organisé à toutes les œuvres marquantes,
                des classiques intemporels aux nouveautés qui font vibrer le monde.<br>

                Explorez les albums, singles et collaborations, plongez dans les détails des sorties,
                et restez à jour avec les dernières actualités musicales. Que vous soyez un mélomane passionné
                ou un simple curieux, Discographix est là pour enrichir votre expérience musicale.</p>
        </div>

        <div class="content_table">
            <table id="myTable">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Nom</td>
                        <td>Auteur</td>
                        <td>Album</td>
                        <td>Categorie</td>
                        <td>Durée</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $music = dataMusiqueJoinCategorie($pdo);
                    for ($i = 0; $i < count($music); $i++) {
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $music[$i]['nom'] ?></td>
                            <td><?= $music[$i]['auteur'] ?></td>
                            <td><a href="detail-album.php?album=<?= $music[$i]['album'] ?>"><?= $music[$i]['album'] ?></td>
                            <td><?= $music[$i]['categorie'] ?></td>
                            <td><?= $music[$i]['duree'] ?></td>
                        </tr>

                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>


    <?php include("include/footer.php") ?>
</body>

</html>