<?php
$conn = new mysqli("localhost", "root", "", "printtrack");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and fetch input
$job_ticket_number = trim($_POST['job_ticket_number']);
$job_name = trim($_POST['job_name']);
$customer_name = trim($_POST['customer_name']);
$material = trim($_POST['material']);
$rcl_code = trim($_POST['rcl_code']);
$color = trim($_POST['color']);
$number_of_colors = trim($_POST['number_of_colors']);
$sheet_size = trim($_POST['sheet_size']);
$pieces_size = trim($_POST['pieces_size']);
$grain_direction = trim($_POST['grain_direction']);
$impression = trim($_POST['impression']);
$number_of_outs = trim($_POST['number_of_outs']);

// Check for duplicate
$check = $conn->prepare("SELECT * FROM jobs WHERE job_ticket_number = ?");
$check->bind_param("s", $job_ticket_number);
$check->execute();
$checkResult = $check->get_result();

if ($checkResult->num_rows > 0) {
    // Duplicate found
    echo "<script>alert('Job with this ticket number already exists!'); window.history.back();</script>";
    exit;
}

// Insert new job
$stmt = $conn->prepare("INSERT INTO jobs (
    job_ticket_number, job_name, customer_name, material, rcl_code, color,
    number_of_colors, sheet_size, pieces_size, grain_direction, impression, number_of_outs
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssss", $job_ticket_number, $job_name, $customer_name, $material, $rcl_code, $color,
    $number_of_colors, $sheet_size, $pieces_size, $grain_direction, $impression, $number_of_outs);

if ($stmt->execute()) {
    echo "<script>alert('Job created successfully!'); window.location.href='jobs.php';</script>";
} else {
    echo "<script>alert('Error creating job: " . $conn->error . "'); window.history.back();</script>";
}

$conn->close();
?>
