$(document).on('click', ".search-result", function (e) {
    e.preventDefault();

    let val = e.currentTarget.innerText;
    let titre = val.split(":")[0];
    let auteur = val.split(":")[1];
    auteur = auteur.trim()

    //Retire la valeur de l'input de recherche pour ne pas laisser des lettres de recherche
    $('#searchInput').val("")


    //fetch de data-musique.php qui va chercher dans la DB 
    fetch(`php-api/data-musique.php?titre=${encodeURIComponent(titre)}&auteur=${encodeURIComponent(auteur)}`)
        .then(res => res.json())
        .then(data => {
            const album = data[0].album;

            if (album.length < 1) {
                album = "Nom d'album inconnue"
            }

            //Populer la page avec les data recçu de la DB            
            $("#nom").text('Titre de la chanson : ' + data[0].nom);
            $("#auteur").text('Auteur : ' + data[0].auteur);
            $("#duree").text('Durée de la chanson : ' + data[0].duree);
            $("#date_publication").text('Publié le : ' + data[0].date_publication);
            $("#album").text('Issus de l\'album : ' + data[0].album);

            $(".search-result").remove()
        });


    
    //avoir le lien pour l'image de l'artiste
    fetch(`php-api/proxy-deezer.php?artist=${auteur.replace(" ", "-")}`)
        .then(res => res.json())
        .then(r => {
            console.log(r)
            $('#img-artiste').attr("src", r.picture_medium)

            //Si on a de la data ou degage le hidden pour tout afficher
            $(".principal-content").css("display", "flex")
        })

});

