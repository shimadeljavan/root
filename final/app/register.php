<?php
session_start();
require_once "includes/connect.php";

$results = [];
$insertedRows = 0;

$username = $_REQUEST["username"]; // Add username field
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

// Check if the password is at least 8 characters long
if (strlen($password) < 8) {
    $results["success"] = false;
    $results["message"] = "Password should be at least 8 characters long.";
} else {
    // Check if the email already exists
    $emailExists = emailExists($link, $email);

    if ($emailExists) {
        $results["success"] = false;
        $results["message"] = "Email already in use. Please use a different email or <a href='login.html'>login</a>.";
    } else {
        // If email is available and password is long enough, proceed with registration
        // Hash the password with Blowfish
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user data into the database
        $query = "INSERT INTO users (id, username, email, password) VALUES (NULL, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $query)) {
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);

            mysqli_stmt_execute($stmt);

            $insertedRows = mysqli_stmt_affected_rows($stmt);

            if ($insertedRows > 0) {
                $results["success"] = true;

                // Set user data in the session (e.g., for displaying email)
                $_SESSION["user_id"] = mysqli_insert_id($link);
                $_SESSION["email"] = $email;
            }

            mysqli_stmt_close($stmt);
        }
    }
}

echo json_encode($results);

// Function to check if email exists in the database
function emailExists($link, $email)
{
    $query = "SELECT email FROM users WHERE email=?";
    $stmt = mysqli_prepare($link, $query);

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $count = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);

    return $count > 0;
}
?>

