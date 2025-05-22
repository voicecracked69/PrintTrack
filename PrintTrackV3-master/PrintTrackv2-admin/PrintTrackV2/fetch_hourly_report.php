<?php
//fetch_hourly_report.php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli("localhost", "root", "", "printtrack");

// Check connection
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Get the ID from POST data
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid ID']);
    exit();
}

// Prepare and execute query
$stmt = $conn->prepare("SELECT * FROM hourly_reports WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(array_merge(['status' => 'success'], $row));
} else {
    echo json_encode(['status' => 'error', 'message' => 'No record found']);
}

$stmt->close();
$conn->close();
?>