<?php
include 'db_connect.php';

$sql = "SELECT COUNT(*) AS pending_count FROM requests WHERE status = 'Pending'";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    echo json_encode(['count' => $row['pending_count']]);
} else {
    echo json_encode(['count' => 0]);
}

$conn->close();
?>
