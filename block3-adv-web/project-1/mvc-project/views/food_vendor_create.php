<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Food Vendor</title>
    <style>

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

    </style>
</head>
<body>
    <h1>Create New Food Vendor</h1>
    <?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ?>
    <!-- views/food_vendor_create.php -->

<!-- Your HTML form with dropdowns for dish, supplier, and ingredient -->
<form method="post" action="?action=createFoodVendor">
    <label for="vendorName">Vendor Name:</label>
    <input type="text" name="vendorName" required>
    
    <label for="dishID">Select Dish:</label>
    
    <select name="dishID" required>
        <option value="" disabled selected>select dish</option>
        <?php foreach ($dishes as $dish): ?>
            <option value="<?php echo $dish['dishID']; ?>"><?php echo $dish['dishName']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="supplierID">Select Supplier:</label>
    <select name="supplierID" required>
    <option value="" disabled selected>select supplier</option>
        <?php foreach ($suppliers as $supplier): ?>
            <option value="<?php echo $supplier['supplierID']; ?>"><?php echo $supplier['supplierName']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="ingredientID">Select Ingredient:</label>
    <select name="ingredientID" required>
    <option value="" disabled selected>select ingredient</option>
        <?php foreach ($ingredients as $ingredient): ?>
            <option value="<?php echo $ingredient['ingredientID']; ?>"><?php echo $ingredient['ingredientName']; ?></option>
        <?php endforeach; ?>
    </select>

    <input class="btn-vendor" type="submit" name="submit" value="Create Food Vendor">
</form>



    <!-- <a href="?action=food_vendor_index">Back to Food Vendors</a> -->

</body>
</html>

