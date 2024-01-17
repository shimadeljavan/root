<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Supplier</title>
    <style>
        .btn-s {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;

        }

        .btn-s:hover {
            background-color: #3e8e41;

        }
     </style>
</head>
<body>

    <h2>Add New Supplier</h2>

    <form action="?action=addSupplier" method="post">
        <label for="supplierName">Supplier Name:</label>
        <input type="text" id="supplierName" name="supplierName"><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br>

        <label for="contactNumber">Contact Number:</label>
        <input type="text" id="contactNumber" name="contactNumber"><br>

        <input type="submit" name="submit" value="Add Supplier">
    </form>

    <p><a class="btn-s" href="?action=showSuppliers">Back to Suppliers List</a></p>

</body>
</html>
