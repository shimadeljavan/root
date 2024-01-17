<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers List</title>
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
    </style>
</head>
<body>

    <h2>Suppliers List</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Supplier ID</th>
                <th>Supplier Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?php echo $supplier['supplierID']; ?></td>
                    <td><?php echo $supplier['supplierName']; ?></td>
                    <td><?php echo $supplier['address']; ?></td>
                    <td><?php echo $supplier['contactNumber']; ?></td>
                    <td>
                        <a class="btn-delete" href="?action=deleteSupplier&supplierID=<?php echo $supplier['supplierID']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a class="btn-add" href="?action=showSupplierForm">Add New Supplier</a></p>

</body>
</html>
