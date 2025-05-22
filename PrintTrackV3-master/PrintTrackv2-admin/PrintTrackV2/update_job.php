<?php
$conn = new mysqli("localhost", "root", "", "printtrack");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$job_ticket_number = $_POST['job_ticket_number'];
$job_name = $_POST['job_name'];
$customer_name = $_POST['customer_name'];
$material = $_POST['material'];
$rcl_code = $_POST['rcl_code'];
$color = $_POST['color'];
$impression = $_POST['impression'];
$number_of_colors = $_POST['number_of_colors'];
$sheet_size = $_POST['sheet_size'];
$pieces_size = $_POST['pieces_size'];
$grain_direction = $_POST['grain_direction'];
$number_of_outs = $_POST['number_of_outs'];

// Update query
$stmt = $conn->prepare("UPDATE jobs SET 
    job_name = ?, customer_name = ?, material = ?, rcl_code = ?, color = ?, 
    impression = ?, number_of_colors = ?, sheet_size = ?, pieces_size = ?, 
    grain_direction = ?, number_of_outs = ? WHERE job_ticket_number = ?");

$stmt->bind_param("ssssssssssss", $job_name, $customer_name, $material, $rcl_code, $color, $impression, 
    $number_of_colors, $sheet_size, $pieces_size, $grain_direction, $number_of_outs, $job_ticket_number);

if ($stmt->execute()) {
    echo "success";  // Return success response
} else {
    echo "error";  // Return error response
}

$stmt->close();
$conn->close();
?>
