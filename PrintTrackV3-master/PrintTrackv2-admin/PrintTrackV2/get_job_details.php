<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "printtrack");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$job_ticket_number = $_POST['job_ticket_number'];

$sql = "SELECT job_name, rcl_code, impression FROM jobs WHERE job_ticket_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $job_ticket_number);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        'job_name' => $row['job_name'],
        'rcl_code' => $row['rcl_code'],
        'impression' => $row['impression']
    ]);
} else {
    echo json_encode([
        'job_name' => '',
        'rcl_code' => '',
        'impression' => ''
    ]);
}

$stmt->close();
$conn->close();
?>