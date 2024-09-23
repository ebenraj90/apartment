<?php
// Start the session
session_start();
// Include database connection
include 'db_connection.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $display_name = $_POST['display_name'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Handle file upload
    $profile_picture = '';
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                $profile_picture = $target_file;
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Failed to upload profile picture!';
                echo json_encode($response);
                exit();
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'File is not an image!';
            echo json_encode($response);
            exit();
        }
    }

    // Assuming you have a users table and a logged-in user
    $user_id = $_SESSION['user_id']; // Ensure you have the user's ID in session

    if ($profile_picture) {
        $query = "UPDATE users SET display_name = ?, full_name = ?, email = ?, phone = ?, profile_picture = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $display_name, $full_name, $email, $phone, $profile_picture, $user_id);
    } else {
        $query = "UPDATE users SET display_name = ?, full_name = ?, email = ?, phone = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssi", $display_name, $full_name, $email, $phone, $user_id);
    }

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Profile updated successfully!';
        if ($profile_picture) {
            $response['profile_picture'] = $profile_picture;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to update profile!';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request!';
}

echo json_encode($response);
?>
