<!-- food_vendor.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Food Vendors</title>
    <style>
        
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, minmax(200px, 1fr));
            padding: 10px;
            gap: 10px;
            margin-bottom: 20px;
        }

        .grid-container p{

            text-align: left;
            padding: 10px;
            border: #637E76 solid 2px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
            color: black;
        }

        .grid-container p:hover{
            box-shadow: #45a049 0px 5px 15px;
        }

        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .btn-back:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>List of Food Vendors</h1>
    <a class="btn-back" href="?action=home">Add New Dish</a>
    
    <?php


    echo '<div class="grid-container">';
    if ($dishesWithVendors) {
        foreach ($dishesWithVendors as $dish) {
            echo '<p>' . 
                'Vendor ID: ' . $dish['foodVendorID'] . '<br>' . 
                'Vendor Name: ' . $dish['vendorName'] . '<br>' . 
                'Supplier ID: ' . $dish['supplierName'] . '<br>' . 
                'Ingredient ID: ' . $dish['ingredientName'] . '<br>' . 
                'Price: $' . $dish['price'] . '<br>' .
                'Dish Name: ' . $dish['dishName'] . '<br>' .
                '</p>';
        }
    } else {
        echo '<p>No food vendors found</p>';
    }
    echo '</div>';
    ?>
</body>
</html>