<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
} else {
    // User is logged in, redirect to dashboard page
    header("Location: dashboard.php");
    exit();
}
?>
