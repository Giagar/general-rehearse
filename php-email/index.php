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
    if(in_array($word, $list)) {
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

    function createArrayOfIntegers($min, $max, $numberOfIntegers) {
        
        $arrayOfIntegers = [];
        
        for($i = count($arrayOfIntegers); $i < $numberOfIntegers;) {
            $newInteger = rand($min, $max);
            
            if(!in_array($newInteger, $arrayOfIntegers)) {
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

    
    foreach($matches as $match => $value) {
        echo $match . ': ' . $value["squadra-casa"] . ' - ' . $value["squadra-ospite"] . ' | ' . $value["punti-casa"]. ' - ' . $value["punti-ospite"] . '<br>';
    }
 
    ?>

</body>

</html>