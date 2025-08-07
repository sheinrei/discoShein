<select name="nom_musique">
    <?php

$dsn = 'mysql:host=localhost;dbname=miniprojetphp';
$user = 'root';
$pass = '';
$pdo = new \PDO($dsn, $user, $pass);


    function searchMusique($pdo)
    {
        $sql = "SELECT nom,auteur FROM  musique ORDER BY `musique`.`nom` ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    $data = searchMusique($pdo);

    for ($i = 0; $i < count($data); $i++) {

        echo "<option  name='nom_musique'>" . $data[$i]['nom'] . " :  " . $data[$i]['auteur'] . "</option>";
    }
    ?>
</select>