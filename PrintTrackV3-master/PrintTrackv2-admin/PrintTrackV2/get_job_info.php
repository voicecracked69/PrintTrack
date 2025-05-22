<?php
$conn = new mysqli("localhost", "root", "", "printtrack");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $job_ticket_number = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM jobs WHERE job_ticket_number = ?");
    $stmt->bind_param("s", $job_ticket_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch job data
        $row = $result->fetch_assoc();
        echo json_encode($row); // Return the data as JSON
    } else {
        echo json_encode(null); // No job found
    }

    $stmt->close();
}

$conn->close();
?>
