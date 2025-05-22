<?php
include 'db_connect.php'; // Connect to DB

$ticket = $_GET['ticket'];

$stmt = $conn->prepare("SELECT job_name, rcl_code, impression FROM jobs WHERE job_ticket_number = ?");
$stmt->bind_param("s", $ticket);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode([]);
}
?>

