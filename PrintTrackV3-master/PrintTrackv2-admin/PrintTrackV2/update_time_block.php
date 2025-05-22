<?php
ob_start(); // Ensure no output before headers
session_start(); // Add this if you're using $_SESSION variables

// update_time_block.php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli("localhost", "root", "", "printtrack");

// Check connection
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Get POST data
$id = isset($_POST['id']) ? $_POST['id'] : '';
$blockNum = isset($_POST['block_num']) ? intval($_POST['block_num']) : 0;
$status = isset($_POST['status']) ? $_POST['status'] : '';
$output = isset($_POST['output']) ? intval($_POST['output']) : 0;
$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';

if (empty($id) || $blockNum < 1 || $blockNum > 12 || empty($status)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    exit();
}

// Update hourly_reports
$query = "UPDATE hourly_reports SET 
          status_$blockNum = ?, 
          output_$blockNum = ?, 
          remarks_$blockNum = ?,
          last_update = NOW()
          WHERE job_ticket_number = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("siss", $status, $output, $remarks, $id);

if (!$stmt->execute()) {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    $stmt->close();
    $conn->close();
    exit();
}
$stmt->close();

// Log update in hourly_update_users
$job_ticket_number = $_SESSION['job_ticket_number'] ?? $id;
$fullname = $_SESSION['fullname'] ?? 'Unknown User';

// Time block labels
$timeBlocks = [
    1 => '07:45–08:45',
    2 => '08:45–09:45',
    3 => '09:45–10:45',
    4 => '10:45–11:45',
    5 => '11:45–12:45',
    6 => '12:45–13:45',
    7 => '13:45–14:45',
    8 => '14:45–15:45',
    9 => '15:45–16:45',
    10 => '16:45–17:45',
    11 => '17:45–18:45',
    12 => '18:45–19:45',
];

$action = $timeBlocks[$blockNum] ?? 'Unknown Block';

$stmt = $conn->prepare("INSERT INTO hourly_update_users (job_ticket_number, fullname, action) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $job_ticket_number, $fullname, $action);
$stmt->execute();
$stmt->close();

$conn->close();

echo json_encode(['status' => 'success']);
ob_end_flush(); // Optional but useful
?>
