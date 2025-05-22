<?php
session_start();
$conn = new mysqli("localhost", "root", "", "printtrack");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    die("User not logged in.");
}

// Safely get POST values and apply null coalescing to prevent undefined index warnings
$pdb_number = $_POST['pdb_number'] ?? '';
$department = $_POST['department'] ?? '';
$jobDate = $_POST['job_date'] ?? '';  // Line 10 issue fixed
$job_ticket_number = $_POST['job_ticket_number'] ?? '';
$customer_name = $_POST['customer_name'] ?? '';
$product_description = $_POST['product_description'] ?? '';
$request_type = $_POST['request_type'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$date_needed = $_POST['date_needed'] ?? '';
$additional_instruction = $_POST['additional_instruction'] ?? '';
$priority_level = $_POST['priority_level'] ?? '';
$request_by = $_POST['request_by'] ?? '';
$status = $_POST['status'] ?? 'Pending';  // default value if not set

// Handle file upload
$attachment = '';
if (!empty($_FILES['attachment']['name'])) {
    $targetDir = "uploads/";
    $attachment = basename($_FILES["attachment"]["name"]);
    $targetFile = $targetDir . $attachment;
    move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFile);
}

// Check for duplicate job ticket number
$check = $conn->prepare("SELECT job_ticket_number FROM requests WHERE job_ticket_number = ?");
$check->bind_param("s", $job_ticket_number);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "duplicate";
} else {
$stmt = $conn->prepare("INSERT INTO requests (
    pdb_number, department, job_date, job_ticket_number, attachment, customer_name,
    product_description, request_type, quantity, date_needed, additional_instruction,
    priority_level, request_by, status, user_id
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param(
    "sssssssssssssss",  // 15 parameters now
    $pdb_number,
    $department,
    $jobDate,
    $job_ticket_number,
    $attachment,
    $customer_name,
    $product_description,
    $request_type,
    $quantity,
    $date_needed,
    $additional_instruction,
    $priority_level,
    $request_by,
    $status,
    $user_id
);


    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error: " . $stmt->error;
    }
}

$conn->close();
?>
