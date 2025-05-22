<?php
$conn = new mysqli("localhost", "root", "", "printtrack");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$job_ticket_number = $_POST['job_ticket_number'];
$request_type = $_POST['request_type'];
$status = $_POST['status'];

// Insert or update the request type status
$stmt = $conn->prepare("REPLACE INTO request_type_status (job_ticket_number, request_type, status) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $job_ticket_number, $request_type, $status);

if ($stmt->execute()) {
    echo "Status for '$request_type' updated to '$status'.";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
