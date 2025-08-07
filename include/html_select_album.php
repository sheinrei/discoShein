<select name="nom_musique">

    <?php

    include("include/functionDB.php");


    $data = searchAlbum($pdo);

    for ($i = 0; $i < count($data); $i++) {

        echo "<option name='nom_album'>" . $data[$i]['nom'] . "</option>";
    }
    ?>
</select>