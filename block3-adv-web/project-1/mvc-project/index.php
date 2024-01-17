<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC with MySQL</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="page">
    <a class="logo" href="https://shima94.web582.com/block3-adv-web/project-1/mvc-project/index.php"><h1>MVC project!</h1></a>
    <div class="grid-btn">
        <!-- <a class="btn-vendor" href="?action=showDishWithVendors">View Join Table</a> -->
        <a class="btn-vendor" href="?action=showIngredients">View Ingredients</a>
        <a class="btn-vendor" href="?action=showSuppliers">View Suppliers</a>
        <a class="btn-vendor" href="?action=showFoodVendorForm">Add Vendors</a>
        <a class="btn-vendor" href="?action=showFoodVendors">View Vendors</a>
        <a class="btn-vendor" href="?action=showDish">List of Dishes</a>
    </div>
    </div>   

    <?php
    include_once 'controllers/controller_main.php'; 
    ?>
</body>
</html>
