<?php
$conn = new mysqli("localhost", "root", "", "printtrack");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$jobTicketNumber = $_GET['job_ticket_number'] ?? '';

$sql = "SELECT * FROM plates WHERE job_ticket_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $jobTicketNumber);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(null);
}

$stmt->close();
$conn->close();
?>
