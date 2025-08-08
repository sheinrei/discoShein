<?php

include('include/head.php');

if (!$_SESSION['is_connect'] == true) {
    header('Location: login.php');
}
if (!$_SESSION['niveau_admin'] == 3) {
    header('location: index.php');
}


$title = "Supprimer album";
include('include/navbar.php');
include("include/functionDB.php");

?>

<style>
    .content {
        width: 40%;
        height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid black;

        background-color: #F5F5F5;
        border-radius: 20px;
        box-shadow: 0 20px 20px;
    }



    .search {
        width: 100%;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;

    }

    select{
        width: 250px;
    }

    button {
        border-radius: 5px;
    }
</style>

<body>
    <div class="content">

        <div class="search">
            <h1>Supprimer un album</h1>
            <h2>Rechercher un album</h2>

            <form action="edit-album.php" method="post">
                <select name="titre_album">
                    <?php
                    $data_search = searchAlbum($pdo);
                    // liste deroulante avec tout les noms d'album
                    for ($i = 0; $i < count($data_search); $i++) {

                        $titre = $data_search[$i]['titre'];

                        $data = dataAlbum($pdo, $titre);
                        $id = $data[0]["id_album"];


                        echo "<option for='titre_album' value='" . $id . "'>" . $data_search[$i]['titre'] . "</option>";
                    }
                    ?>
                </select>

                <button value="Supprimer" style="background-color:green">Supprimer</button>
            </form>

        </div>
    </div>
    <?php
    include("include/footer.php");
    ?>

    <script>
        $("button[value='Supprimer']").on("click", function(e) {
            e.preventDefault();

            const id = $("select").val();

            fetch('php-api/supprimer-album.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${encodeURIComponent(id)}`
                })
                .then(r => r.json())
                .then(data => {
                    if (data) {
                        alert(`Effacement de l'album id = "${id}" efféctuée`)
                    }

                })
        })
    </script>

</body>