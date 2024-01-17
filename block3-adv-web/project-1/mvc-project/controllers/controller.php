<?php
    include_once 'models/model.php';

    class Controller {
        private $dish;
        private $model;
        // private $ingredient;
        public function __construct($connection) {
            $this->dish = new dishModel($connection);
        }
        public function showDish() {
            $dishs = $this->dish->selectDish();
            include 'views/home.php';
        }
        public function showForm() {
            include 'views/form.php';
        }
        public function add() {
            // $dishName = $_POST['dishName'];
            // $price = $_POST['price'];
            $dishID = isset($_POST['dishID']) ? $_POST['dishID'] : '';
            $dishName = isset($_POST['dishName']) ? $_POST['dishName'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            if(!$dishName) {
                echo "<p>Missing information</p>";
                $this->showForm();
                return;
            } else if($this->dish->insertDish($dishName,$price)) {
                echo "<p>Added dish: $dishName successfully </p>";
            } else {
                echo "<p>Could not add dish </p>";
            }
            $this->showDish();
        }

        
    public function editForm($dishID) {
                
        $dish = $this->dish->getDishByID($dishID);

        if ($dish) {
            include 'views/edit_form.php'; 
        } else {
            echo "<p>Dish not found</p>";
            // $this->showDish();
        }
    }

    public function update($dishID, $dishName, $price) {
        if ($this->dish->updateDish($dishID, $dishName, $price)) {
            echo "<p>Updated dish: $dishName successfully </p>";
        } else {
            echo "<p>Could not update dish </p>";
        }
        $this->showDish();
    }



    public function deleteForm($dishID) {
        $dish = $this->dish->getDishByID($dishID);
    
        if ($dish) {
            include 'views/delete_form.php';
        } else {
            echo "<p>Dish not found</p>";
            // $this->showDish();
        }

    }
    
    public function delete($dishID) {
        if ($this->dish->deleteDish($dishID)) {
            echo "<p>Deleted dish with ID: $dishID successfully </p>";
        } else {
            echo "<p>Could not delete dish </p>";
        }
    
        $this->showDish();
    }

//natural join
public function showDishWithVendors() {
    $dishesWithVendors = $this->dish->naturalJoinDishesWithVendors();
    include 'views/food_vendor.php'; 
}
//end
    }
    $connection = new ConnectionObject("localhost", "shima_food", "shimashima261710", "shima94_food");
    $controller = new Controller($connection);
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if ($action === 'edit') {
            $dishID = isset($_GET['dishID']) ? $_GET['dishID'] : '';
            if ($dishID) {
                $controller->editForm($dishID);
            } else {
                echo "<p>Error: Dish ID not provided for editing.</p>";
            }
        } elseif ($action === 'update') {
            if (isset($_POST['submit'])) {
                $dishID = $_POST['dishID'];
                $dishName = $_POST['dishName'];
                $price = $_POST['price'];
                $controller->update($dishID, $dishName, $price);
            } else {
                echo "<p>Error: Form not submitted for update.</p>";
            }
        } elseif ($action === 'delete') {
            $dishID = isset($_GET['dishID']) ? $_GET['dishID'] : '';
            if ($dishID) {
                $controller->deleteForm($dishID);
            } else {
                echo "<p>Error: Dish ID not provided for deletion.</p>";
            }
        } elseif ($action === 'confirm_delete') {
            if (isset($_POST['submit'])) {
                $dishID = $_POST['dishID'];
                $controller->delete($dishID);
            } else {
                echo "<p>Error: Form not submitted for deletion confirmation.</p>";
            }
        } elseif ($action === 'showDish') {
            $controller->showDish();
        }elseif ($action === 'showDishWithVendors') {
            $controller->showDishWithVendors();
         }elseif(isset($_POST['addDish'])){
                        $controller->add();        
         }
        elseif($action === 'home'){
            $controller->showForm();
        }
?>

