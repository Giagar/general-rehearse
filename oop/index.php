<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Visibility and Inheritance</h2>
<?php 
class Person {
    protected $name; // it can be accessed only from inside this class and its children classes
    private $surname = "Person_surname"; // it can be accessed only from inside this class

    public function greetings() { // it can be accessed from everywhere
        echo "Hey!";
    }
    
    public function getName() {
        echo $this->name;
    }
    public function getSurname() {
        echo $this->surname;
    }
}

class CustomPerson extends Person {
    public function setName($nameValue) {
        $this->name = $nameValue;
    }
}

$person1 = new CustomPerson();
$person1->setName("person1_name");
echo $person1->getName();
?>

<h2>Polymorphism</h2>
<?php 
class User extends Person {
    public function greetings() {
        echo "Hello!";
    }
}
$person2 = new User();
echo $person1->greetings();
echo $person2->greetings();
?>

<h2>Constructor</h2>
<?php 

class Employee extends Person {
    public $employer;

    function __construct($employer)
    {
        $this->employer = $employer;
    }

    public function getEmployer() {
        echo $this->employer;
    }
}

$employee1 = new Employee("employer1");

echo $employee1->getEmployer();
?>

<h2>Exceptions</h2>
<?php 
function sayName($name) {
    if(!is_string($name)) {
        throw new Exception("It's not a string");
    }
    return "Il nome è $name";
}

try{
    echo sayName(14);
} catch (Exception $e) {
    echo "Eccezione: " . $e->getMessage();
}
?>
</body>
</html>
