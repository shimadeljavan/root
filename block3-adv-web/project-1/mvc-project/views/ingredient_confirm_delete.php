<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Ingredient Deletion</title>
    <!-- Add your styles if needed -->
</head>
<body>
    <h2>Confirm Ingredient Deletion</h2>

    <?php if (isset($ingredient)): ?>
        <p>You are about to delete the following ingredient:</p>
        <p><strong>Ingredient ID:</strong> <?php echo $ingredient['ingredientID']; ?></p>
        <p><strong>Name:</strong> <?php echo $ingredient['ingredientName']; ?></p>
        <p><strong>Type:</strong> <?php echo $ingredient['type']; ?></p>
        <p><strong>Price:</strong> <?php echo $ingredient['price']; ?></p>

        <form method="post" action="?action=deleteIngredient">
            <input type="hidden" name="ingredientID" value="<?php echo $ingredient['ingredientID']; ?>">
            <input type="submit" name="submit" value="Confirm Deletion">
        </form>

        <a href="?action=showIngredients">Cancel</a>
    <?php else: ?>
        <p>Error: Ingredient details not available.</p>
        <a href="?action=showIngredients">Go back</a>
    <?php endif; ?>
</body>
</html>
