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
    public $gender = "Person_gender";

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
echo "<br>";
echo $person1->getSurname();
echo "<br>";
echo $person1->gender;
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
echo "<br>";
echo "dopo funzione";
?>

<hr>

<h2>Rehearse</h2>
<h3>Visibility, Inheritance, Polymorphism, Constructor</h3>
<?php 
class Animal {
    protected $name;
    private $id;
    private $type;
    
    function __construct($id, $type) {
        $this->id = $id;
        $this->type = $type;
    }

    public function getId() {
        return $this->id;
    }

    public function voice() {
        return "original voice";
    }
}

class CustomAnimal extends Animal {
    public function getName() {
        return $this->name;
    }

    public function setName($newName) {
        $this->name = $newName;
    }

    public function voice() {
        return "new voice";
    }
}

$animal1 = new CustomAnimal(14, "type1");
$animal1->setName("animal1_name");
echo $animal1->getName();
echo "<br>";
echo $animal1->getId();
echo "<br>";
echo $animal1->voice();
?>

<h3>Exceptions</h3>
<?php 
function sum($a, $b) {
    if(!is_int($a) || !is_int($b)) {
        throw new Exception("Both of the args need to be a number");
    }
    return $a + $b;
}

try{
    echo sum(9, 10);
} catch(Exception $e) {
    echo $e->getMessage();
}
?>
</body>
</html>
