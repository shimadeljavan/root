<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Ingredients</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-add {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .btn-add:hover {
            background-color: #3e8e41;
        }

        .btn-delete {
            display: inline-block;
            padding: 2px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-delete:hover {
            background-color: darkred;
        }

        .btn-add-vendor {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .btn-add-vendor:hover {
            background-color: #3e8e41;
            
        }
    </style>
</head>
<body>

<h2>List of Ingredients</h2>

<table>
    <thead>
        <tr>
            <th>Ingredient ID</th>
            <th>Ingredient Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ingredients as $ingredient) : ?>
            <tr>
                <td><?php echo $ingredient['ingredientID']; ?></td>
                <td><?php echo $ingredient['ingredientName']; ?></td>
                <td><?php echo $ingredient['type']; ?></td>
                <td><?php echo $ingredient['price']; ?> $</td>
                <td>
                    <a class="btn-delete" href="?action=deleteIngredient&ingredientID=<?php echo $ingredient['ingredientID']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p><a class="btn-add-vendor" href="?action=showIngredientForm">Add New Ingredient</a></p>

</body>
</html>
