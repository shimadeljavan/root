<?php

    $host = 'localhost:3306';
    $database = 'shima94_food';
    $username = 'shima_food';
    $password = 'shimashima261710';

    try{
    $mysqli = new mysqli($host, $username, $password, $database);

    }catch(Exception $e){
    $error = "Error: ";
    $error .= $e->getMessage();
    include ('views/error.php');
    exit();
}

?>