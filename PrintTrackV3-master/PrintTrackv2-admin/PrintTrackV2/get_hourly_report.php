<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'printtrack';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'DB connection failed']));
}

$job_ticket_number = $_GET['job_ticket_number'] ?? '';

$sql = "SELECT * FROM hourly_reports WHERE job_ticket_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $job_ticket_number);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode(['success' => true, 'data' => $row]);
} else {
    echo json_encode(['success' => false, 'message' => 'No report found']);
}

$stmt->close();
$conn->close();
?>
