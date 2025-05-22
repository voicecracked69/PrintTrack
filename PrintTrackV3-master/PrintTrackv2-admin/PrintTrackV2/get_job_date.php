<?php
include 'db_connect.php';

if (isset($_GET['job_ticket_number'])) {
    $job_ticket_number = $_GET['job_ticket_number'];

    $stmt = $conn->prepare("SELECT job_date FROM jobs WHERE job_ticket_number = ?");
    $stmt->bind_param("s", $job_ticket_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode(['job_date' => $row['job_date']]);
    } else {
        echo json_encode(['job_date' => null]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['job_date' => null]);
}
