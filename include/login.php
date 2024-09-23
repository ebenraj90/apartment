<?php
include "conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']) ? $_POST['remember_me'] : false;

    // Protect against SQL injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Fetch user data from the database
    $sql = "SELECT * FROM Users WHERE email='$username'";
    $result = $conn->query($sql);
    session_start();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password (plain text comparison)
        if ($password === $row['password']) {
            // Set session or cookie
            if ($remember_me) {
                // Set a cookie that expires in 30 days
                setcookie('user', $username, time() + (86400 * 30), "/");
            } else {
                // Set session
                
                $_SESSION['user'] = $username;

            }
            $_SESSION['user'] = $username;
            echo json_encode(['status' => 'success', 'message' => 'Login successful']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
    }
}

$conn->close();
?>
