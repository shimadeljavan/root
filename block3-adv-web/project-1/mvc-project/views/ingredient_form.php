<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Ingredient</title>
    <style>
        .btn-vendor {
            
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;

        }

        .btn-vendor:hover {
            background-color: #3e8e41;
        }
        </style>
</head>
<body>

<h2>Add New Ingredient</h2>

<form action="?action=addIngredient" method="post">
    <label for="ingredientName">Ingredient Name:</label>
    <input type="text" id="ingredientName" name="ingredientName"><br>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type"><br>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price"><br>

    <input type="submit" name="submit" value="Add Ingredient">
</form>


<p><a class="btn-vendor" href="?action=showIngredients">Back to Ingredient List</a></p>

</body>
</html>

