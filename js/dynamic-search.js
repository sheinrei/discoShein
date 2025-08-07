$('#searchInput').on('input', function () {
    const lettre = this.value;

    if (lettre.length == 0) {
        $("#return").text("")
        return
    }


    fetch('php-api/input-search.php?lettre=' + encodeURIComponent(lettre))
        .then(res => res.json())
        .then(data => {
            let html = "";


            if (data.length > 3) {
                for (i = 0; i < 3; i++) {
                    html += `<p class="search-result">${data[i].nom + " : " + data[i].auteur}</p>`;
                    document.getElementById("return").innerHTML = html
                    //$('#return').append(html);

                }
            } else {
                data.forEach(item => {
                    html += `<p class="search-result">${item.nom + " : " + item.auteur} </p>`;
                });
                document.getElementById("return").innerHTML = html
                //$('#return').append(html);


            }


        });
});