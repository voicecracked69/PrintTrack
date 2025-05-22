<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "printtrack";
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get job_ticket_number from GET parameter
$jobTicketNumber = isset($_GET['job_ticket_number']) ? $_GET['job_ticket_number'] : '';

// Prepare the query to fetch request data
$sql = "SELECT * FROM requests WHERE job_ticket_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $jobTicketNumber);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the data as an associative array
if ($result->num_rows > 0) {
    $requestData = $result->fetch_assoc();
    echo json_encode($requestData); // Send the data as JSON
} else {
    echo json_encode(null); // No data found
}

$stmt->close();
$conn->close();
?>
