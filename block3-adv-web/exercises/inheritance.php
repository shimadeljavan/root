<?php

class Animal {
    public function makeSound() {
        echo "Generic animal sound\n";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow!\n";
    }
}

//car
class Vehicle {
    public function drive() {
        echo "Driving a vehicle";
    }
}

class Car extends Vehicle {
    public function drive() {
        echo "Repairing a car";
    }
}


//shape

class Shape {
    public function getArea() {
        return "Area calculation";
    }
}

class Rectangle extends Shape {
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function getArea() {
        return $this->length * $this->width;
    }
}


class Employee {
    protected $salary;

    public function __construct($salary) {
        $this->salary = $salary;
    }

    public function work() {
        echo "Employee is working.";
    }

    public function getSalary() {
        return $this->salary;
    }
}


class BankAccount {
    protected $balance;

    public function __construct($initialBalance) {
        $this->balance = $initialBalance;
    }

    public function deposit($amount) {
        $this->balance += $amount;
        echo "Deposited: $amount\n";
    }

    public function withdraw($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrawn: $amount\n";
        } else {
            echo "Insufficient funds. Withdrawal denied.\n";
        }
    }

    public function getBalance() {
        return $this->balance;
    }
}

class SavingsAccount extends BankAccount {
    public function withdraw($amount) {
        if ($this->balance - $amount >= 100) {
            parent::withdraw($amount);
        } else {
            echo "Withdrawal denied. Minimum balance of 100 must be maintained.\n";
        }
    }
}




class BankAccount {
    protected $balance;

    public function __construct($initialBalance) {
        $this->balance = $initialBalance;
    }

    public function deposit($amount) {
        $this->balance += $amount;
        echo "Deposited: $amount\n";
    }

    public function withdraw($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrawn: $amount\n";
        } else {
            echo "Insufficient funds. Withdrawal denied.\n";
        }
    }

    public function getBalance() {
        return $this->balance;
    }
}

class SavingsAccount extends BankAccount {
    public function withdraw($amount) {
        if ($this->balance - $amount >= 100) {
            parent::withdraw($amount);
        } else {
            echo "Withdrawal denied. Minimum balance of 100 must be maintained.\n";
        }
    }
}

class Animal {
    public $name;
    public function move() {
        echo "The animal is moving.";
    }
}

class Cheetah extends Animal {
    public function move() {
        echo "The dog is running.";
    }
}



class Person {
    protected $firstName;
    protected $lastName;

    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }
}

class Employee extends Person {
    private $employeeId;
    private $jobTitle;

    public function __construct($firstName, $lastName, $employeeId, $jobTitle) {
        parent::__construct($firstName, $lastName);
        $this->employeeId = $employeeId;
        $this->jobTitle = $jobTitle;
    }

    public function getEmployeeId() {
        return $this->employeeId;
    }

    public function getLastName() {
        
        return $this->lastName . ', ' . $this->jobTitle;
    }
}
?>