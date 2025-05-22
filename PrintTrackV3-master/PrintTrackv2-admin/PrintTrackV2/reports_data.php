<?php
// Set header to return JSON
header('Content-Type: application/json');

// Connect to the database
$conn = new mysqli("localhost", "root", "", "printtrack");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch report data
$sql = "SELECT * FROM reports ORDER BY id DESC";
$result = $conn->query($sql);

// Initialize an array to store the report data
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the connection
$conn->close();

// Return the data as JSON
echo json_encode(["data" => $data]);
?>
