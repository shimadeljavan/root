<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Vendors</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
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
            margin-top: 40px;
        }

        .btn-add:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <h1>List of Food Vendors</h1>

    <?php
    if ($foodVendors === false) {
        echo "<p>Error fetching data from the database.</p>";
    } else {
    ?>
        <table>
            <tr>
                <th>Food Vendor ID</th>
                <th>Vendor Name</th>
                <th>Dish Name</th>
                <th>Supplier Name</th>
                <th>Ingredient Name</th>
            </tr>
            <?php
            foreach ($foodVendors as $vendor) {
                echo "<tr>";
                echo "<td>{$vendor['foodVendorID']}</td>";
                echo "<td>" . (isset($vendor['vendorName']) ? $vendor['vendorName'] : '') . "</td>";
                echo "<td>" . (isset($vendor['dishName']) ? $vendor['dishName'] : '') . "</td>";
                echo "<td>" . (isset($vendor['supplierName']) ? $vendor['supplierName'] : '') . "</td>";
                echo "<td>" . (isset($vendor['ingredientName']) ? $vendor['ingredientName'] : '') . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php
    }
    ?>

    <a class="btn-vendor" href="?action=showFoodVendorForm">Add New Food Vendor</a>
</body>
</html>

