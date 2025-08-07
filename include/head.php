<?php
ini_set('session.gc_maxlifetime', 3600);
session_start();
$title;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ancizar+Serif:ital,wght@0,300..900;1,300..900&family=Jura:wght@300..700&family=Lisu+Bosa:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Markazi+Text:wght@400..700&display=swap" rel="stylesheet">

    <!-- import jquerry and dataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

    <!-- import bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <!-- mon css -->
    <link rel='stylesheet' href="style.css">

    <script>
        $(document).ready(function() {
            new DataTable('#myTable', {
                paging: false,
                info: true,
                scrollCollapse: true,
                scrollY: '300px',
                language: {
                    search: "Rechercher :",
                    lengthMenu: "Afficher _MENU_ lignes",
                    info: "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                    infoEmpty: "Aucune donnée à afficher",
                    paginate: {
                        first: "Début",
                        last: "Fin",
                        next: "Suivant",
                        previous: "Précédent"
                    }
                }
            })
        })
    </script>
</head>



<?php
//set une boite pour les message erreur php;
function handlerErreur($niveau, $message, $fichier, $ligne)
{
    $types = [
        E_ERROR => 'Erreur fatale',
        E_WARNING => 'Avertissement',
        E_NOTICE => 'Notice',
        E_USER_ERROR => 'Erreur personnalisée',
        E_USER_WARNING => 'Avertissement personnalisé',
        E_USER_NOTICE => 'Notice personnalisée',
        E_DEPRECATED => 'Fonction obsolète',
    ];

    $typeTexte = $types[$niveau] ?? 'Erreur inconnue';

    echo "<div style='background:#ffdddd;padding:10px;border-left:5px solid red;margin:10px 0;'>";
    echo "<strong>[$typeTexte]</strong> $message<br>";
    echo "<small>Dans <code>$fichier</code> à la ligne <strong>$ligne</strong></small>";
    echo "</div>";
}

// Je dis à PHP d'utiliser ma fonction pour gérer les erreurs
set_error_handler("handlerErreur");
?>

<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        min-height: 100vh;

        background: #030303;
        background: linear-gradient(185deg, rgba(3, 3, 3, 1) 5%, rgba(255, 255, 255, 1) 23%,
         rgba(107, 107, 107, 1) 35%, rgba(255, 255, 255, 1) 46%, rgba(117, 117, 117, 1) 63%,
          rgba(245, 245, 245, 1) 83%, rgba(0, 0, 0, 1) 100%);
    }

    p {
        font-size: 1.2em;
    }

</style>