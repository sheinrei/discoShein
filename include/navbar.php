<nav style="width: 100%;" class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">DiscoShein</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Musique</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="album.php">Album</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="detail-musique.php">One musique</a>
                </li>

                <?php
                if (isset($_SESSION['is_connect'])) {
                    if ($_SESSION['is_connect'] == true ) {
                ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Se Deconnecter</a>
                        </li>

                <?php }
                } ?>


                <?php
                // Si on a pas lvl admin mini acces aux page de modif DB
                if ($_SESSION['niveau_admin'] > 1) {
                ?>

                    <li class="nav-item">
                        <a class="nav-link" href="add-musique.php">Ajouter Musique</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="add-album.php">Ajouter Album</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="edit-musique.php">Modifier Musique</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="edit-album.php">Modifier Album</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="deleat-musique.php">Supprimer musique</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="deleat-album.php">Supprimer Album</a>
                    </li>

                <?php } ?>






            </ul>
        </div>
    </div>
</nav>