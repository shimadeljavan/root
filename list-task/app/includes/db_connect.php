<?php

$host = "localhost:3306";
$db = "shima94_todo_list";
$user = "shima94_db_music";
$pass = "MohsenMohsen261710";

$conn = mysqli_connect($host, $user, $pass, $db);


$db_response = [];
$db_response['success'] = 'not set';
if(!$conn){
    $db_response['success'] = false;
}else{
    $db_response['success'] = true;
}

//echo json_encode($db_response);


?>