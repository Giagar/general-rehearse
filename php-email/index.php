<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Rehearse</h1>
    <h2>Checking the email spelling</h2>
    <?php
    if (isset($_GET["email"])) {

        $email = $_GET["email"];
        if (strpos($email, "@") && strpos($email, ".")) {
            var_dump(strpos($email, "@"));
            echo "the email '$email' is correct";
        } else {
            echo "the email is not correct";
        }
    } else {
        echo "there's no email";
    }
    ?>

    <hr>

    <h2>Playing with arrays</h2>
    <?php
    $list = ["first", "second", "third", "fourth", "fifth", "sixth"];

    // get the word from the user
    $word = $_GET["word"];

    // check if if the word is in the array
    if (in_array($word, $list)) {
        $result =  "<p>The word $word is in the list at position " . array_search($word, $list);
    } else {
        $result = "The word '$word' is not in the list";
    }

    // printing the result
    echo $result;
    ?>

    <hr>

    <h2>Create an array of random numbers</h2>
    <?php

    function createArrayOfIntegers($min, $max, $numberOfIntegers)
    {

        $arrayOfIntegers = [];

        for ($i = count($arrayOfIntegers); $i < $numberOfIntegers;) {
            $newInteger = rand($min, $max);

            if (!in_array($newInteger, $arrayOfIntegers)) {
                $arrayOfIntegers[] = $newInteger;
                $i++;
            }
        }

        return $arrayOfIntegers;
    }

    var_dump(createArrayOfIntegers(1, 5, 5));
    ?>

    <hr>

    <h2>Snack1</h2>
    <div class="assignment-container">
        <h3>Assignment:</h3>
        <p>Creiamo un array 'matches' contenente altri array i
            quali rappresentano delle partite di basket di
            un’ipotetica tappa del calendario. Ogni array della
            partita avrà una squadra di casa e una squadra
            ospite, punti fatti dalla squadra di casa e punti fatti
            dalla squadra ospite.
            Stampiamo a schermo tutte le partite con questo
            schema:
            Olimpia Milano - Cantù | 55 - 60</p>
    </div>
    <br>
    <?php

    $matches = [
        "partita1" => [
            "squadra-casa" => "nome-casa-p1",
            "squadra-ospite" => "nome-ospite-p1",
            "punti-casa" => rand(1, 5),
            "punti-ospite" => rand(1, 5),
        ],

        "partita2" => [
            "squadra-casa" => "nome-casa-p2",
            "squadra-ospite" => "nome-ospite-p2",
            "punti-casa" => rand(1, 5),
            "punti-ospite" => rand(1, 5),
        ],

        "partita3" => [
            "squadra-casa" => "nome-casa-p3",
            "squadra-ospite" => "nome-ospite-p3",
            "punti-casa" => rand(1, 5),
            "punti-ospite" => rand(1, 5),
        ],

        "partita4" => [
            "squadra-casa" => "nome-casa-p4",
            "squadra-ospite" => "nome-ospite-p4",
            "punti-casa" => rand(1, 5),
            "punti-ospite" => rand(1, 5),
        ],

        "partita5" => [
            "squadra-casa" => "nome-casa-p5",
            "squadra-ospite" => "nome-ospite-p5",
            "punti-casa" => rand(1, 5),
            "punti-ospite" => rand(1, 5),
        ],

    ];


    foreach ($matches as $match => $value) {
        echo $match . ': ' . $value["squadra-casa"] . ' - ' . $value["squadra-ospite"] . ' | ' . $value["punti-casa"] . ' - ' . $value["punti-ospite"] . '<br>';
    }

    ?>
    <hr>
    <h2>Snack 2</h2>
    <div class="assignment-container">
        <h3>Assignment:</h3>
        <p>Passare come parametri GET name, mail e age e
            verificare (cercando i metodi che non
            conosciamo nella documentazione) che:
            1. name sia più lungo di 3 caratteri,
            2. mail contenga un punto e una chiocciola
            3. age sia un numero.
            Se tutto è ok stampare “Accesso riuscito”, altrimenti
            “Accesso negato”</p>
    </div>
    <?php
    ["name" => $name, "mail" => $email, "age" => $age] = $_GET;
    var_dump(strlen($name) > 3);
    
    if(strlen($name) > 3 && strpos($email, ".") && strpos($email, "@") && is_numeric($age)) {
        $result_s2 = "Access granted";
    } else {
        $result_s2 = "Access denied";
    }

    echo $result_s2;
    ?>

</body>

</html>