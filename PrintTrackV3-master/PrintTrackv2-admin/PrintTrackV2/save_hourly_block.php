<?php
include 'db_connect.php'; // your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $time_block = $_POST['time_block'];
    $block_number = $_POST['block_number']; // 1 to 12
    $status = $_POST['status'];
    $output = (int) $_POST['output'];
    $remarks = $_POST['remarks'];

    // Validate block number
    if ($block_number < 1 || $block_number > 12) {
        die("Invalid time block number.");
    }

    // Create dynamic column names
    $status_col = "status_$block_number";
    $output_col = "output_$block_number";
    $remarks_col = "remarks_$block_number";

    // Update the block fields
    $sql = "UPDATE hourly_reports SET 
                $status_col = ?, 
                $output_col = ?, 
                $remarks_col = ?
            WHERE time_block = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisi", $status, $output, $remarks, $time_block);

    if ($stmt->execute()) {
        // Recalculate total output
