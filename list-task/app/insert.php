<?php

require_once "includes/db_connect.php";

$results = [];
$insertedRows = 0;

try {
    if (!isset($_REQUEST["name"]) || !isset($_REQUEST["description"]) || !isset($_REQUEST["deadline"])) {
        throw new Exception('Required data is missing, i.e., "name"');
    }

    // Prepare the SQL query
    $query = "INSERT INTO tasks (name, description, deadline) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, 'sss', $_REQUEST["name"], $_REQUEST["description"], $_REQUEST["deadline"]);
        mysqli_stmt_execute($stmt);
        $insertedRows = mysqli_stmt_affected_rows($stmt);

        if ($insertedRows > 0) {
            $results[] = [
                "insertedRows" => $insertedRows,
                "id" => $conn->insert_id,
                "name" => $_REQUEST["name"],
                "description" => $_REQUEST["description"],
                "deadline" => $_REQUEST["deadline"]
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
