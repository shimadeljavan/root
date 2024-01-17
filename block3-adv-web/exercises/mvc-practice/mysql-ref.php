
<?php
$host = 'localhost:3306';
$dbname = 'shima94_mvc_example';
$username = 'shima_mvc_example';
$password = '';

 $mysql = new mysqli("$host", "$username", "$password", "$dbname");

//  $db_response = [];
//  $db_response['success'] = false;

// if (!$mysql){
//     $db_response['success'] = false;
// }else{
//     $db_response['success'] = true;
// }

// echo json_encode($db_response);

if($mysql->connect_error){
    exit('Could not connect');
}

 $result = $mysql->query("SELECT * FROM shima_flower");
//  $row = $result->fetch_assoc();

 while ($row = $result->fetch_assoc()) {
    var_dump($row);
     echo "ID: " . $row["id"] . "<br>";
     echo "Name: " . $row["name"] . "<br>";
     echo "Color: " . $row["color"] . "<br>";
     echo "Age: " . $row["age"] . "<br>";
     echo "Price: " . $row["price"] . "<br>";
    //  $row = $result->fetch_assoc();
 }

//  https://shima94.web582.com/block3-adv-web/exercises/mvc-practice/mysql-reference.php

?>