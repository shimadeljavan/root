<?php 


require_once "includes/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"];
    $param = ""; // Initialize the parameter to be updated
    $value = ""; // Initialize the new value

    // Check if a specific parameter is provided and set it accordingly
    if (isset($_POST["name"])) {
        $param = "name";
        $value = $_POST["name"];
    } elseif (isset($_POST["description"])) {
        $param = "description";
        $value = $_POST["description"];
    } elseif (isset($_POST["deadline"])) {
        $param = "deadline";
        $value = $_POST["deadline"];
    } elseif (isset($_POST["completed"])) {
        $param = "completed";
        $value = $_POST["completed"];
    }

    if (!empty($param)) {
        // Use a prepared statement to update the specific parameter
        $query = "UPDATE tasks SET $param = ? WHERE id = ?";
        $insertData = 0;
        $results = [];

        if ($statement = mysqli_prepare($link, $query)) {
            mysqli_stmt_bind_param($statement, "si", $value, $id);

            mysqli_stmt_execute($statement);

            $insertData = mysqli_stmt_affected_rows($statement);

            if ($insertData > 0) {
                echo json_encode("Todo list has been updated");
            } else {
                echo json_encode("No changes were made");
            }
        } else {
            echo json_encode("Failed to prepare statement");
        }
    } else {
        echo json_encode("No valid parameter provided");
    }
}





?> 