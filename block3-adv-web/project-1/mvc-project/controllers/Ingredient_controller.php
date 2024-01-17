<?php
$connection = new ConnectionObject("localhost", "shima_food", "shimashima261710", "shima94_food");
require_once 'models/model_ingredient.php';

class IngredientController {
    private $ingredient;

    public function __construct($connection) {
        $this->ingredient = new IngredientModel($connection);
    }

    public function showIngredients() {
        $ingredients = $this->ingredient->selectIngredients();
        include 'views/ingredients.php';
    }

    public function showIngredientForm() {
        include 'views/ingredient_form.php';
    }

    public function addIngredient() {
        $ingredientName = $_POST['ingredientName'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        if(!$ingredientName) {
            echo "<p>Missing information</p>";
            $this->showIngredientForm();
            return;
        } else if($this->ingredient->insertIngredient($ingredientName, $type, $price)) {
            echo "<p>Added ingredient: $ingredientName successfully </p>";
        } else {
            echo "<p>Could not add ingredient </p>";
        }
        $this->showIngredients();
    
      
    }
 


    public function deleteIngredient($ingredientID) {
        $ingredient = $this->ingredient->getIngredientByID($ingredientID);
        if ($ingredient) {
            include 'views/ingredient_delete.php';
        }else {
            echo "<p>Ingredient not found</p>";
            $this->showIngredients();
        }
    }

    public function confirm_deleteIngredient($ingredientID) {
        if ($this->ingredient->deleteIngredient($ingredientID)) {
            echo "<p>this Ingredient ID : $ingredientID deleted successfully</p>";
        } else {
            echo "<p>Could not delete ingredient</p>";
        }
        $this->showIngredients();
        }
}
 $ingredientController = new IngredientController($connection);
if ($action === 'showIngredients') {
        $ingredientController->showIngredients();
    } elseif ($action === 'showIngredientForm') {
        $ingredientController->showIngredientForm();
    } elseif ($action === 'addIngredient') {
        $ingredientController->addIngredient();
    } elseif ($action === 'deleteIngredient') {
        $ingredientID = isset($_GET['ingredientID']) ? $_GET['ingredientID'] : '';
        if ($ingredientID) {
            $ingredientController->deleteIngredient($ingredientID);
        } else {
            echo "<p>Error: Ingredient ID not provided for deletion.</p>";
        }
    } elseif ($action === 'confirm_deleteIngredient') {
        $ingredientID = isset($_GET['ingredientID']) ? $_GET['ingredientID'] : '';
        $ingredientController->confirm_deleteIngredient($ingredientID);
    }
?>
