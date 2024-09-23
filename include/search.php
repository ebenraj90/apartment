<?php
header('Content-Type: application/json');

// Get the search query
$query = isset($_POST['query']) ? $_POST['query'] : '';

include 'conn.php';

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM users WHERE name LIKE ?");
$searchTerm = "%" . $query . "%";
$stmt->bind_param("s", $searchTerm);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Fetch results
$users = [];
while ($row = $result->fetch_assoc()) {
  $users[] = $row;
}

// Close connection
$stmt->close();
$conn->close();

// Return JSON response
echo json_encode($users);
?>
