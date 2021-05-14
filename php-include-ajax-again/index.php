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
<h2>1: Including variables from other files</h2>
<?php 

require_once "./partials/my-colors.php";

foreach($my_favourite_colors as $color) {
    echo $color . "<br>";
}

?>
<hr>

<h2>2: Sending data to a server via http request and getting filtered data from a database via server</h2>
<h3>Using fetch</h3>
<div class="result2"></div>
<script>
// fetching data from the server
let genre2 = "classic";

fetch(`http://localhost:8888/general-rehearse/php-include-ajax-again/server_js.php?genre=${genre2}`)
.then(res => res.json())
.then(data => data.forEach(album => {
    let result = `<div>Titolo: ${album.title}, genre: ${album.genre}</div>`;
    document.querySelector(".result2").innerHTML += result;
}));
</script>

<h3>Using vue and axios</h3>
<div id="app">
    <div class="album" v-for="album in albums">Title: {{album.title}}, genre: {{album.genre}}</div>
</div>
<script src="./script/vue.js"></script>
</body>
</html>