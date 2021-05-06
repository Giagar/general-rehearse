
<?php 

echo strlen($_GET['customer-name']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
</head>
<body>

    <form action="./index.php">
        <input type="text" name="customer-name" placeholder="customer name">
        <input type="submit" value="Submit">
    </form>
    
    <?php
        // $input = $_GET['customer-name'];
        // if(strlen($input) > 0) {
        //     echo '<div class="result">' . $input . '</div>';
        // } 

        foreach($_GET as $item) {
            echo '<p>' . $item . '</p>';
        }

        $str = ' stringa di prova ';
        $str = trim($str);
        var_dump(explode(' ', $str));
        echo str_replace(' ', '', $str) . "<br>";
        echo strlen($str) . "<br>";
        echo strpos($str, ' ') . "<br>";
        echo ucfirst($str) . "<br>";
        echo ucwords($str) . "<br>";
        echo 'array associativo';
        var_dump(['prop1key'=>'prop1value', 'propo2key'=>'prop2value']);
        echo 'array numerico';
        var_dump(['prop1', 'propo2']);

        $par = "paragrafo di testo.";
        echo 'Il testo del paragrafo è: "' . $par . '"; la sua lunghezza: ' . strlen($par) . ' caratteri. <br>';
        $badword = $_GET['badword'];
        if(strlen($badword) > 0) {
            echo str_replace($badword, '***', $par);
        }
    ?>
    
</body>
</html>