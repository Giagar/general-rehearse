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
</body>
</html>