<?php

ini_set('display_errors', 1);

class Flower {
    public $name;
    private $color;
    private $age;
    private $price;

    public function __construct($name, $color, $age, $price) {
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;        
    }

    public function ageRule() {
        if ($this->age >= 5) {
            return "it's young flower";
        } else {
            return "it's old flower";
        }
    }

    // public function setAgeRule($age) {
    //     $this->age = $age;
    // }

    public function colorRule() {
        return $this->color;
    }

    // public function setColorRule($color) {
    //     $this->color = $color;
    // }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        if ($price > 30) {
            $discountedPrice = $price * 0.9; 
            $this->price = $discountedPrice;
        } else {
            $this->price = $price;
            
        }
    }
}

$flower1 = new Flower("Rose", "Red", 5, 20);
echo "Name: " . $flower1->getName() . "<br>";
echo "Age Rule: " . $flower1->ageRule() . "<br>";
echo "Color Rule: " . $flower1->colorRule() . "<br>";
$flower1->setPrice(20);
echo "Price: " . $flower1->getPrice() . "<br>";

$flower2 = new Flower("Tulip", "green", 10, 33);
echo "Name: " . $flower2->getName() . "<br>";
echo "Age Rule: " . $flower2->ageRule() . "<br>";
echo "Color Rule: " . $flower2->colorRule() . "<br>";
$flower2->setPrice(33);
echo "Price: " . $flower2->getPrice() . "<br>";



?>