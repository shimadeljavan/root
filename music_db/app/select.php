<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    //connect to database
    require_once "includes/db_connect.php";

    $stmt = mysqli_prepare($link, "SELECT name, email, musicvideo, timestamp FROM music ORDER BY timestamp DESC");
    mysqli_stmt_execute($stmt);


    //show results
    $result = mysqli_stmt_get_result($stmt);

    //loop
    while($row = mysqli_fetch_assoc($result)){
        $results[] = $row;
    }


    //encode & dispaly json
    echo json_encode($results);

    //close the link to the database
    mysqli_close($link);



?>