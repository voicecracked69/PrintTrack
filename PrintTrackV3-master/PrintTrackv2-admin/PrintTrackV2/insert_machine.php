<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "printtrack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$machineName = $_POST['machineName'];
$jobTicket = $_POST['jobTicket'];
$jobName = $_POST['jobName'];
$rclCode = $_POST['rclCode'];
$impression = $_POST['impression'];
$plant = $_POST['plant'];
$status = $_POST['status'];

// Check for duplicate job ticket number
$checkQuery = "SELECT job_ticket_number FROM machines WHERE job_ticket_number = ?";
$checkStmt = $conn->prepare($checkQuery);
$checkStmt->bind_param("s", $jobTicket);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    // Duplicate found
    echo "duplicate";
} else {
    // Proceed with insert
    $sql = "INSERT INTO machines (machine_name, job_ticket_number, job_name, rcl_code, impression, plant, machine_status)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $machineName, $jobTicket, $jobName, $rclCode, $impression, $plant, $status);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
}

$checkStmt->close();
$conn->close();
?>

