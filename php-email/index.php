<?php 

if(isset($_GET["email"])) {
    
    $email = $_GET["email"];
    if(strpos($email, "@") && strpos($email, ".")) {
        var_dump(strpos($email, "@"));
        echo "the email '$email' is correct";
    } else {
        echo "the email is not correct";
    }

} else {
    echo "there's no email";
}


?>