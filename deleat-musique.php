<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!$_SESSION['is_connect'] == true) {
    header('Location: login.php');
}
if (!$_SESSION['niveau_admin'] == 3) {
    header('location: index.php');
}

$title = "Supprimer une musique";
include('include/head.php');
include('include/navbar.php');
include('include/functionDb.php');
include('include/function.php');
?>


<style>
    .content {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .content-top {
        border: 1px solid black;
        border-radius: 10px;
        background-color: #F8F9FA;
        padding: 30px;
        width: 50%;
        height: 240px;
        min-width: 300px;



        display: flex;
        flex-direction: column;
        align-items: center;

        margin-top: 20px;
        margin-bottom: 40px;
    }

    .search {
        width: 100%;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;

    }

    .input-result {
        width: 100%;
    }

    #searchInput {
        width: 100%;
        border-radius: 5px;
    }

    .search-result {
        overflow: hidden;
        border: 1px solid black;
        height: 32px;
        margin: 0;
        margin-top: 1px;
        padding: 6px;
        background-color: #F8F9FA;
        text-align: center;
        cursor: pointer;
    }

    .search-result:hover {
        background-color: #D9DAD2;
        cursor: pointer;
    }

    .form-search {
        width: 90%;
    }

    #confirmation {
        display: flex;
        border: 1px solid black;
        width: 300px;
        justify-content: space-between;
        background-color: #F5F5F5;
        border-radius: 20px;
        box-shadow: 0 20px 20px;
    }

    #action {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 20px;
    }

    button {
        border-radius: 5px;
    }

    #confirmation {
        padding: 10px;
    }

</style>





<div class="content">
    <div class="content-top">
        <h1>Supprimer une musique </h1>
        <div class="titre">
            <h2>Rechercher une chanson</h2>

        </div>

        <div class="search">
            <form action="detail-musique.php" method="post" class="form-search">
                <input type="search" name="titre" id="searchInput" placeholder="Search">
                <div id="return"></div>
            </form>
        </div>
    </div>

    <div id="confirmation">
        <div id="data_selec">
            <ul>
                <li>titre : </li>
                <li>auteur : </li>
                <li>album : </li>
                <li>id : </li>
            </ul>
        </div>
        <div id="action">
            <button value="Confirmer" style="background-color:green">Confirmer</button>
            <button value="Annuler" style="background-color:red">Annuler</button>
        </div>
    </div>
</div>

<script src="js/dynamic-search.js"></script>

<script>
    $(function() {
        let id;

        //clic sur selection du champs de recherche
        $(document).on("click", ".search-result", function(e) {
            let val = e.currentTarget.innerText;
            let titre = val.split(":")[0];
            let auteur = val.split(":")[1];
            auteur = auteur.trim()

            //fetch les infos de la musique
            fetch(`php-api/data-musique.php?titre=${encodeURIComponent(titre)}&auteur=${encodeURIComponent(auteur)}`)
                .then(res => res.json())
                .then(data => {
                    const album = data[0].album;


                    if (album.length < 1) {
                        album = "Nom d'album inconnue"
                    }

                    // Populer les data
                    const enfant = $("#data_selec").children().children();
                    $(enfant).eq(0).text(`titre : ${titre}`);
                    $(enfant).eq(1).text(`auteur : ${auteur}`);
                    $(enfant).eq(2).text(`album : ${data[0].album}`);
                    $(enfant).eq(3).text(`id : ${data[0].id_musique}`);
                    id = data[0].id_musique

                });



        })


        //clic sur bouton
        $("button[value='Confirmer']").on("click", function(e) {
            e.preventDefault();

            fetch('php-api/supprimer-musique.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${encodeURIComponent(id)}`


                })
                .then(r => r.json())
                .then(data => {
                    console.log(data)
                    if (data) {
                        alert(`Effacement de la musique id "${id}" efféctuée`)
                    } else {
                        const enfant = $("#data_selec").children().children();
                        $(enfant).eq(0).text(`titre : `);
                        $(enfant).eq(1).text(`auteur : `);
                        $(enfant).eq(2).text(`album : `);
                        $(enfant).eq(3).text(`id : `);
                    }
                })
        })

        $("button[value='Annuler']").on("click", function(e) {
            const enfant = $("#data_selec").children().children();
            $(enfant).eq(0).text(`titre : `);
            $(enfant).eq(1).text(`auteur : `);
            $(enfant).eq(2).text(`album : `);
            $(enfant).eq(3).text(`id : `);
        })
    })
</script>


<?php
include("include/footer.php");
?>