<?php
include 'db_connect.php'; // Connect to DB

$query = "SELECT job_ticket_number FROM jobs";
$result = mysqli_query($conn, $query);

$tickets = [];
while ($row = mysqli_fetch_assoc($result)) {
    $tickets[] = $row;
}

echo json_encode($tickets);
?>
