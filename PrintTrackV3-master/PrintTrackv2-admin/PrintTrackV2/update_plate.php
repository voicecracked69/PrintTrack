<?php
// Get data from the POST request
$job_ticket_number = $_POST['job_ticket_number'];
$job_name = $_POST['job_name'];
$color = $_POST['color'];
$shift = $_POST['shift'];
$plant = $_POST['plant'];
$status = $_POST['status'];
$plate_status = $_POST['plateStatus'];

// Connect to the database
$conn = new mysqli("localhost", "root", "", "printtrack");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query to update the plate data including color
$sql = "UPDATE plates SET job_name=?, shift=?, plant=?, job_status=?, plate_status=?, color=? WHERE job_ticket_number=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $job_name, $shift, $plant, $status, $plate_status, $color, $job_ticket_number);

if ($stmt->execute()) {
    echo 'success'; // Send success response
} else {
    echo 'error'; // Send error response
}

$stmt->close();
$conn->close();
?>
