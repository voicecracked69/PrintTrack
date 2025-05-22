<?php
include('db_connect.php');

if (isset($_POST['job_ticket_number'])) {
    $job_ticket_number = $_POST['job_ticket_number'];

    $query = "SELECT job_name, rcl_code, impression FROM machines WHERE job_ticket_number = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $job_ticket_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    }
}
?>
