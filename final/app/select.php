<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "includes/connect.php";

$stmt = mysqli_prepare($link, "SELECT * FROM tasks WHERE completed = '0' ORDER BY deadline ASC");

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)){
    $results[] = $row;
}

echo json_encode($results);

mysqli_close($link);
?>