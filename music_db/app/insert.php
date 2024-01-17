<?php
//vasl kadan be db_connect.php 
    require_once "includes/db_connect.php";

    $results = [];
    $insertedRows = 0;


    $query = "INSERT INTO  music  ( name ,  email ,  musicvideo ) VALUES (? , ? , ?);";

    if($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, 'sss', $_REQUEST["full_name"], $_REQUEST["email"], $_REQUEST["musicvideo"]);
        mysqli_stmt_execute($stmt);
        $insertedRows = mysqli_stmt_affected_rows($stmt);

        if ($insertedRows > 0) {
            $results[] = [
                "insertedRows" => $insertedRows,
                "id" => $link->insert_id,
                "fullname" => $_REQUEST["full_name"]
            ];
        }
        }

        echo json_encode($results);

        //https://shima94.web582.com/dynamic/music_db/app/insert.php?full_name=Mehri&email=meri@skls.com&musicvideo=Haydeh
    
    

?>