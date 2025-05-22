<?php
// update_request.php
include 'db_connect.php'; // Make sure this connects to your DB properly

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_ticket_number = $_POST['job_ticket_number'] ?? '';
    $status = $_POST['status'] ?? '';

    if (empty($job_ticket_number) || empty($status)) {
        echo "Missing job ticket number or status";
        exit;
    }

    // Use prepared statements for security
    $stmt = $conn->prepare("UPDATE requests SET status = ? WHERE job_ticket_number = ?");
    $stmt->bind_param("ss", $status, $job_ticket_number);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method";
}
