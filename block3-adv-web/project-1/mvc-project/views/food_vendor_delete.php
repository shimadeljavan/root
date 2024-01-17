<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Food Vendor</title>
</head>
<body>
    <h1>Delete Food Vendor</h1>

    <?php
    
    echo "<p>Are you sure you want to delete the food vendor '{$foodVendorDetails['vendorName']}'?</p>";
    ?>

    <form action="process_delete.php" method="post">
        <input type="hidden" name="foodVendorID" value="<?php echo $foodVendorDetails['foodVendorID']; ?>">
        <button type="submit">Yes, Delete</button>
    </form>

    <a href="food_vendor_index.php">Cancel</a>

</body>
</html>
