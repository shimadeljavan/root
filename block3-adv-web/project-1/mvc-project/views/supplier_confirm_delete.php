<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Supplier Deletion</title>
    <!-- Add your styles if needed -->
</head>
<body>
    <h2>Confirm Supplier Deletion</h2>


    <?php if (isset($supplier)): ?>
        <p>You are about to delete the following supplier:</p>
        <p><strong>Supplier ID:</strong> <?php echo $supplier['supplierID']; ?></p>
        <p><strong>Name:</strong> <?php echo $supplier['supplierName']; ?></p>
        <p><strong>Address:</strong> <?php echo $supplier['address']; ?></p>
        <p><strong>Contact Number:</strong> <?php echo $supplier['contactNumber']; ?></p>

        <!-- <form method="post" action="?action=confirm_deleteSupplier&supplierID=<?php echo $supplier['supplierID']; ?>"> -->

        <form method="post" action="?action=confirm_deleteSupplier">
            <input type="hidden" name="supplierID" value="<?php echo $supplier['supplierID']; ?>">
            <input type="submit" name="submit" value="Confirm Deletion">
        </form>

        <a href="?action=showSuppliers">Cancel</a>
    <?php else: ?>
        <p>Error: Supplier details not available.</p>
        <a href="?action=showSuppliers">Go back</a>
    <?php endif; ?>
</body>
</html>
