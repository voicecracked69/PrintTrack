<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "printtrack");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data from POST
$jobTicketNumber = $_POST['jobTicketNumber'];
$jobName = $_POST['jobName'];
$jobDate = $_POST['jobDate'];
$color = $_POST['color'];
$shift = $_POST['shift'];
$plant = $_POST['plant'];
$status = $_POST['status'];
$plateStatus = $_POST['plateStatus'];

// Prepare and execute insert query
$stmt = $conn->prepare("INSERT INTO plates (job_ticket_number, job_name, job_date, color, shift, plant, job_status, plate_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $jobTicketNumber, $jobName, $jobDate, $color, $shift, $plant, $status, $plateStatus);

if ($stmt->execute()) {
    echo "Success";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
