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

    if (strlen($name) > 3 && strpos($email, ".") && strpos($email, "@") && is_numeric($age)) {
        $result_s2 = "Access granted";
    } else {
        $result_s2 = "Access denied";
    }

    echo $result_s2;
    ?>

    <hr>
    <h2>Snack 3</h2>
    <div class="assignment-container">
        <h3>Assignment:</h3>
        <p>Creare un array di array.
            Ogni array figlio avrà come chiave una data in questo formato: DD/MM/YYYY
            (ad es 31/01/2007) e come valore un array di post associati a quella data.
            Stampare ogni data con i relativi post.

            Qui l’array di esempio:
            <a href="https://www.codepile.net/pile/R2K5d68z" target="_blank">link</a>
        </p>
    </div>
    <?php

    ?>

    <hr>
    <h2>Snack 4</h2>
    <div class="assignment-container">
        <h3>Assignment:</h3>
        <p>Creare un array contenente qualche alunno di un’ipotetica classe. Ogni alunno
            avrà Nome, Cognome e un array contenente i suoi voti scolastici.
            Stampare Nome, Cognome e la media dei voti di ogni alunno.
        </p>
    </div>
    <?php
    $students = [
        "student1" => [
            "name" => "st1-name",
            "surname" => "st1-surname",
            "scores" => [rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10)]
        ],
        "student2" => [
            "name" => "st2-name",
            "surname" => "st2-surname",
            "scores" => [rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10)]
        ],
        "student3" => [
            "name" => "st3-name",
            "surname" => "st3-surname",
            "scores" => [rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10)]
        ],
        "student4" => [
            "name" => "st4-name",
            "surname" => "st4-surname",
            "scores" => [rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10)]
        ],
        "student5" => [
            "name" => "st5-name",
            "surname" => "st5-surname",
            "scores" => [rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10)]
        ],
        "student6" => [
            "name" => "st6-name",
            "surname" => "st6-surname",
            "scores" => [rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10), rand(6, 10)]
        ]
    ];

    foreach ($students as $key => $student) {
        $scoreAverage = 0;
        foreach ($student["scores"] as $score) {
            $scoreAverage += $score;
        }
        $scoreAverage = $scoreAverage / count($student["scores"]);
        echo $student["name"] . " " . $student["surname"] . ", " . $scoreAverage . "<br>";
    }
    ?>

    <hr>
    <h2>Snack 5</h2>
    <div class="assignment-container">
        <h3>Assignment:</h3>
        <p>Prendere un testo abbastanza lungo, contenente diverse frasi.
            Suddividere il testo in tanti paragrafi
            &lt;p&gt;: ad ogni punto corrisponde un nuovo
            paragrafo.
        </p>
    </div>
    <?php
    $text = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati quisquam perspiciatis dolore dignissimos tempore blanditiis maiores ratione! Velit assumenda beatae tempore, nulla eaque perferendis deleniti totam vitae sunt voluptatem iusto.";
    $newText = explode(". ", $text);
    $result_s5 = [];
    
    foreach($newText as $sentence) {
        $result_s5[] = "<p>" . $sentence . ".</p>";
    }

    $result_s5 = implode("", $result_s5);

    echo preg_replace("/\.{2}/i", ".", $result_s5);

    ?>

</body>

</html>