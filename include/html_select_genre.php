<?php


$dsn = 'mysql:host=localhost;dbname=miniprojetphp';
$user = 'root';
$pass = '';
$pdo = new \PDO($dsn, $user, $pass);


function searchCategorie($pdo)
{
    $sql = "SELECT categorie FROM categorie_musique ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}


$data = searchCategorie($pdo);

?>
<select name="categorie">
    <?php
    
    for ($i = 0; $i < count($data); $i++) {
        $j = $i + 1;
        echo "<option value='$j' name='categorie_id'>" . $data[$i]['categorie'] . "</option>";
    }
    ?>

</select>