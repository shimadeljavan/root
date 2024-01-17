<?php
require_once "includes/connect.php";

$results = [];
$insertedRows = 0;

try {
    $taskId = $_REQUEST["task_id"];

    // Prepare the SQL query to mark the task as completed
    $query = "UPDATE tasks SET completed = 1 WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, 'i', $taskId);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Task not found or already completed."]);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to prepare the SQL statement."]);
    }
} catch (Exception $error) {
    echo json_encode(["error" => $error->getMessage()]);
    $results[] = ["error" => $error->getMessage()];
} finally {
    //echo json_encode($results);
}
?>