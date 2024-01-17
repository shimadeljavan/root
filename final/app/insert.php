<?php

session_start();

require_once "includes/connect.php";

$userid = $_SESSION["user_id"] ;
$isloggedin = $_SESSION["login"] ;

$results = [];
$insertedRows = 0;

if (!$isloggedin) {
    header("Location: login.php");
}

try {
    if (!isset($_REQUEST["name"]) || !isset($_REQUEST["description"]) || !isset($_REQUEST["deadline"])) {
        throw new Exception('Required data is missing, i.e., "name"');
    }

    // Prepare the SQL query
    $query = "INSERT INTO tasks (user_id, name, description, deadline, completed) VALUES (?, ?, ?, ?, ?);";

    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, 'ssssi', $userid, $_REQUEST["name"], $_REQUEST["description"], $_REQUEST["deadline"] , $_REQUEST["completed"]);

        mysqli_stmt_execute($stmt);
        $insertedRows = mysqli_stmt_affected_rows($stmt);

        //https://shima94.web582.com/dynamic/final/app/insert.php?name=shima&description=fefe&deadline=2025-04-09

        if ($insertedRows > 0) {
            $results[] = [
                "insertedRows" => $insertedRows,
                "id" => $link->insert_id,
                "name" => $_REQUEST["name"],
                "description" => $_REQUEST["description"],
                "deadline" => $_REQUEST["deadline"],
                "message" => "Add todo success"
            ];
        } else {
            throw new Exception("No rows were inserted.");
        }
    } else {
        throw new Exception("Prepared statement did not insert data.");
    }
} catch (Exception $error) {
    echo json_encode(["error" => $error->getMessage()]);
    $results[] = ["error" => $error->getMessage()];
} finally {
    echo json_encode($results);
}
?>

