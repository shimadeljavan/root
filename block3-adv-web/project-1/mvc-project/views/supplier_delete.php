<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Supplier Confirmation</title>
</head>
<body>

<h2>Delete Supplier Confirmation</h2>
<p style="color: red;">Are you sure you want to delete the following supplier?</p>
<p><strong>Supplier ID:</strong> <?php echo $supplier['supplierID']; ?></p>
<p><strong>Supplier Name:</strong> <?php echo $supplier['supplierName']; ?></p>
<p><strong>Address:</strong> <?php echo $supplier['address']; ?></p>
<p><strong>Contact Number:</strong> $<?php echo $supplier['contactNumber']; ?></p>

<p><strong>ID:</strong> <?php echo $supplier['supplierID']; ?></p>

<form method="post" action="?action=confirm_deleteSupplier&supplierID=<?php echo $supplier['supplierID']; ?>">
        <input type="hidden" name="supplierID" value="<?php echo $supplier['supplierID']; ?>">
        <input type="submit" name="submit" value="Confirm Delete">
        <a href="?action=showSuppliers">Cancel</a>
    </form>
</body>
</html>
