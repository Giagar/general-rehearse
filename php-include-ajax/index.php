<?php
include "./partials/colors.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
</head>

<body>
    <h2>Including variabes from other files</h2>
    <h3>Including variables starting from the launched script</h3>
    <?php
    echo $var1;
    ?>
    <hr>
    <h3>Including variables using the magic costant DIR</h3>
    <?php
    echo $var2;
    ?>
    <h2>Fetching data with json_encode() and fetch()</h2>
    <ul class="fetch_result"></ul>
    <script>
        fetch("http://localhost:8888/general-rehearse/php-include-ajax/data/database.php")
            .then(res => res.json())
            .then(data => {
                let result = "";
                data.forEach(obj => result += `<li>Name: ${obj.name}, surname: ${obj.last_name};</li>`);
                document.querySelector(".fetch_result").innerHTML = result;
            });
    </script>
    <hr>
    <h2>Exercise 1</h2>
    <div class="assignment-container">
        <h3>Assignment</h3>
        <p>Stampare a schermo una decina di dischi musicali
            (vedi screenshot) in due modi diversi:
            - Solo con l’utilizzo di PHP, che stampa
            direttamente i dischi in pagina: al caricamento
            della pagina ci saranno tutti i dischi.
            - Attraverso l’utilizzo di AJAX: al caricamento
            della pagina ajax chiederà attraverso una
            chiamata i dischi a php e li stamperà.
            Utilizzare: Html, <strike>Sass</strike>, Vue Axios, Php
            Opzionale:
            - Attraverso un’altra chiamata ajax, filtrare gli
            album per genere</p>
    </div>
    <h3>PHP</h3>
    <?php 
        include "./data/disc-collection-php.php";
    ?>

    <div class="disc-collection">
        <?php foreach($discCollection as $disc) {
            echo "<div class=\"disc-container\">
                <h4>" . $disc["title"] . "</h4>
                <div>" . $disc["author"] . "</div>
                <div>" . $disc["genre"] . "</div>
                </div>";
        } ?>
    </div>

    <h3>AXIOS</h3>
    <div class="exercise1-result">
        
    </div>
    <script>
        axios
        .get("http://localhost:8888/general-rehearse/php-include-ajax/data/disc-collection-js.php")
        .then(res => {
            let result = `<div class="disc-collection">`;
            res.data.forEach(disc => result += `
            <div class="disc-container">
            <h4>${disc.title}</h4>
            <div>${disc.author}</div>
            <div>${disc.genre}</div>
            </div>
            `);
            result += "</div>";
            document.querySelector(".exercise1-result").innerHTML = result;
        });
    </script>

    <h3>VUE</h3>
    <p>Album filtered by genre</p>
    <div id="app_e1">
        <select name="genres" id="genres" v-model="selectedGenre" @change="handleGenre">
            <option value="all">--All--</option>
            <option v-for="(genre, index) in genres" :key="index">{{genre}}</option>
        </select>
        <div class="disc-collection">
            <div class="disc-container" v-for="album in albums">
                <h4>{{album.title}}</h4>
                <div>{{album.author}}</div>
                <div>{{album.genre}}</div>
            </div>
        </div>
    </div>
    <script src="./script/script_vue_e1.js"></script>
    
    <h3>VUE again</h3>
    <div id="app_e1r">
        <select name="filter" id="filter" @change="handleFilter(filter.value)">
            <option value="all">-- All --</option>
            <option v-for="(genre, index) in genres" :key="index" :value="genre">{{genre}}</option>
        </select>
        <div class="disc-collection">
            <div class="disc-container" v-for="(disc, index) in albums" :key="index">
                <h4>{{disc.title}}</h4>
                <div>{{disc.author}}</div>
                <div>{{disc.genre}}</div>
            </div>
        </div>
    </div>
    <script src="./script/script_e1r.js"></script>
</body>

</html>