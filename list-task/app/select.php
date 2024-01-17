<?php
require_once "includes/db_connect.php";

$stmt = mysqli_prepare($conn, "SELECT * FROM tasks WHERE completed = 0 ORDER BY deadline ASC");

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)){
    $results[] = $row;
}

echo json_encode($results);

mysqli_close($conn);
?>