<?php
// Start a session (if not already started)
session_start();

// Clear all session data
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: ../login.html");
exit();
?>