<?php
//vasl kadan be db_connect.php 
    require_once "includes/db_connect.php";

    $results = [];
    $insertedRows = 0;

    try{
        if(!isset($_REQUEST["full_name"]) || !isset($_REQUEST["email"]) || !isset($_REQUEST["musicvideo"])){
            throw new Exception('required data is missing i.e. "full_name"');
        }

        $query = "INSERT INTO music ( name ,  email ,  musicvideo ) VALUES (? , ? , ?)";

        if($stmt = mysqli_prepare($link, $query)) {
            mysqli_stmt_bind_param($stmt, 'sss', $_REQUEST["full_name"], $_REQUEST["email"], $_REQUEST["musicvideo"]);
            mysqli_stmt_execute($stmt);
            $insertedRows = mysqli_stmt_affected_rows($stmt);
    
            if ($insertedRows > 0) {
                $results[] = [
                    "insertedRows" => $insertedRows,
                    "id" => $link->insert_id,
                    "fullname" => $_REQUEST["full_name"],
                    "musicvideo" => $_REQUEST["musicvideo"]
                ];
            }else{
                throw new Exception("no rows were inserted.");
            }
           
    
            //echo json_encode($results);

        }else{
            throw new Exception("prepared statement did not insert data.");
        }



    }catch(Exception $error){
        echo json_encode(["error" => $error->getMessage()]);
        $results[] = ["error"=>$error->getMessage()];

    }finally{
        echo json_encode($results);
    }


        //https://shima94.web582.com/dynamic/music_db/app/insert.php?full_name=Mehri&email=meri@skls.com&musicvideo=Haydeh
    

?>