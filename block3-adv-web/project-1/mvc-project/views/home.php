<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of dish</title>
    <style>
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

        .btn-edit {
            border: #4caf50 solid 2px;
            padding: 5px 5px;
            /* background-color: #4caf50; */
            color: #4caf50;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 20px;
            margin-left: 10px;
            font-size: 16px;
            margin-right: auto;
        }

        .btn-edit:hover {
            background-color: #45a049;
            color: #fff;
        }

        .btn-delete {
            border: #7D0A0A solid 2px;
            padding: 5px 5px;
            /* background-color: #BF3131; */
            color: #7D0A0A;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            margin-right: auto;
        }

        .btn-delete:hover {
            background-color: #7D0A0A;
            color: #fff;
        }

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

    .grid-container {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.grid-container th, .grid-container td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

.grid-container th {
    background-color: #f2f2f2;
}
    </style>
</head>
<body>
<h1>List of Dish</h1>
<a class="btn-back" href="?action=home">Add New Dish</a>
<?php

//new code////////////////////////////
echo '<div class="grid-container">';
if ($dishs) {
    foreach ($dishs as $dish) {
        echo '<p>' . 
            'Dish ID: ' . $dish['dishID'] . '<br>' . 
            'Dish Name: ' . $dish['dishName'] . '<br>' . 
            'Price: $' . $dish['price'] . '<br>' . 
            '<a class="btn-edit" href="?action=edit&dishID=' . $dish['dishID'] . '">Edit</a> ' . 
            '<a class="btn-delete" href="?action=delete&dishID=' . $dish['dishID'] . '">Delete</a>' . 
            '</p>';
    }
} else {
    echo '<p>No dishes found</p>';
}
echo '</div>';


?>
    
</body>
</html>