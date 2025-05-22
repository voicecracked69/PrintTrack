<?php
// Include DB connection
include 'db_connect.php'; // Update this to your actual DB connection file

if (isset($_GET['job_ticket_number'])) {
    $jobTicket = $_GET['job_ticket_number'];

    // Prepare statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM requests WHERE job_ticket_number = ?");
    $stmt->bind_param("s", $jobTicket);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if data exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "No request found."]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "No job ticket number provided."]);
}
?>
