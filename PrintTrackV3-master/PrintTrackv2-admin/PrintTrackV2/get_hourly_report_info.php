<?php
require 'db_connect.php'; // include your database connection

if (isset($_GET['job_ticket_number'])) {
    $jt = $_GET['job_ticket_number'];
    $stmt = $conn->prepare("SELECT * FROM hourly_reports WHERE job_ticket_number = ?");
    $stmt->bind_param("s", $jt);
    $stmt->execute();
    $result = $stmt->get_result();
    $report = $result->fetch_assoc();
    echo json_encode($report);
}
?>
