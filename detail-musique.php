<?php

if (!$_SESSION['is_connect'] == true) {
    header('Location: login.php');
}

$title = "Detail de ma chanson";

include("include/head.php");
include("include/functionDb.php");
include("include/navbar.php");
include("include/function.php");

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

    .principal-content {
        align-items: center;
        gap: 100px;
        display: none;
        /* desactive l'affichage on la reactive après avoir selec une chanson */
    }


    .content-middle,
    .content-right {
        border: 1px solid black;
        min-height: 300px;
        width: 350px;
        margin-bottom: 50px;
        background-color: #F5F5F5;
        padding-left: 10px;

        display: flex;
        flex-direction: column;
        justify-content: center;
    }


    .content-left {
        border: 1px solid black;

    }


    img {
        object-fit: fill;
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
    }

    .search-result:hover {
        background-color: #D9DAD2;
        cursor: pointer;
    }

    .form-search {
        width: 90%;
    }
</style>


<body>
    <div class="content">
        <h1>Detail de la chanson</h1>
        <div class="content-top">
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

        <?php

        ?>
        <div class="principal-content">
            <div class="content-left">
                <img id="img-artiste" src="" alt="Photo d'un artiste">

            </div>
            <div class="content-middle">
            
                    <p id="nom">nom</p>
                    <p id="auteur">auteur</p>
                    <p id="duree">duree</p>
                    <p id="date_publication">date publication</p>
                    <p id="album">album?</p>
                
            </div>
            <div class="content-right">
                <p id="ifram">i frame youtube?</p>
            </div>
        </div>

    </div>



</body>


<script src="js/dynamic-search.js"></script>
<script src="js/detail-musique.js"></script>


<?php include("include/footer.php") ?>

</html>