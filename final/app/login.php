<?php
session_start();
require_once "includes/connect.php";

$results = [];


$usernameOrEmail = $_REQUEST["username"]; // Use "username" input for username or email
$password = $_REQUEST["password"];

$query = "SELECT * FROM users WHERE username=? OR email=?";

if ($stmt = mysqli_prepare($link, $query)) {
    mysqli_stmt_bind_param($stmt, "ss", $usernameOrEmail, $usernameOrEmail);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user["password"])) {
     
        $results["success"] = [
                "insertedRows" => $insertedRows,
                "id" => $_SESSION["user_id"],
                "isLoggedIn" => $_SESSION["login"]
        ];

        // Set user data in the session (e.g., for displaying email)
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["login"] = true;
        $_SESSION["email"] = $user["email"];
        //echo $_SESSION["user_id"] . "this is login " . $_SESSION["login"];
    } else {
        $results["success"] = false;
        $results["message"] = "Information does not match. <a href='register.html'>Register</a> if you don't have an account.";
    }

    mysqli_stmt_close($stmt);

echo json_encode($results);
}
?>

