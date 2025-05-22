<?php
include 'db_connect.php'; // Your DB connection

if (isset($_GET['job_id'])) {
    $jobId = $_GET['job_id'];
    $stmt = $conn->prepare("SELECT impression FROM reports WHERE id = ?");
    $stmt->bind_param("i", $jobId);
    $stmt->execute();
    $stmt->bind_result($impression);
    if ($stmt->fetch()) {
        echo json_encode(["impression" => $impression]);
    } else {
        echo json_encode(["impression" => 0]);
    }
    $stmt->close();
}
?>
