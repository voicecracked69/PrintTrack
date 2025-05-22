<?php
include 'db_connect.php';

$query = "SELECT job_ticket_number FROM jobs ORDER BY job_ticket_number ASC";
$result = mysqli_query($conn, $query);

$tickets = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tickets[] = $row;
}

echo json_encode($tickets);
?>
