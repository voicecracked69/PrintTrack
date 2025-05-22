<?php
include('db_connect.php');

if (isset($_POST['machine'])) {
    $machine = $_POST['machine'];

    $query = "SELECT DISTINCT job_ticket_number FROM machines WHERE machine_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $machine);
    $stmt->execute();
    $result = $stmt->get_result();

    $tickets = [];
    while ($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }

    echo json_encode($tickets);
}
?>
