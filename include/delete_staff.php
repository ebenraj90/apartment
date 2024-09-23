<?php
// Assuming you're using MySQL and have connected to your database
include 'conn.php'; // Make sure this points to your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $staffId = intval($_POST['id']); // Secure the input

    // Prepare the SQL DELETE query
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $staffId);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $conn->close();
}
?>
