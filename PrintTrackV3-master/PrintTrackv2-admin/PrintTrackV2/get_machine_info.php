<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "printtrack";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

if (isset($_POST['job_ticket_number'])) {
    $job_ticket_number = $conn->real_escape_string($_POST['job_ticket_number']);
    $sql = "SELECT * FROM machines WHERE job_ticket_number = '$job_ticket_number'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $machine = $result->fetch_assoc();
        echo json_encode(['status' => 'success', 'data' => $machine]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No data found']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}

$conn->close();
?>
