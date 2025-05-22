<?php
include 'db_connect.php'; // Adjust if your DB connection file has a different name

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $timeBlock = $_POST['time_block'];
    $status = $_POST['status'];
    $output = $_POST['output'];
    $remarks = $_POST['remarks'];

    // Dynamically determine which columns to update based on the time block number
    $statusCol = "status_$timeBlock";
    $outputCol = "output_$timeBlock";
    $remarksCol = "remarks_$timeBlock";

    // Check if a row already exists for this time block
    $checkSql = "SELECT * FROM hourly_reports WHERE time_block = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("i", $timeBlock);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Row exists: UPDATE
        $updateSql = "UPDATE hourly_reports SET $statusCol = ?, $outputCol = ?, $remarksCol = ? WHERE time_block = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("sisi", $status, $output, $remarks, $timeBlock);
        if ($stmt->execute()) {
            echo "Time Block $timeBlock updated successfully.";
        } else {
            echo "Update error: " . $stmt->error;
        }
    } else {
        // Row doesn't exist: INSERT
        $insertSql = "INSERT INTO hourly_reports (time_block, $statusCol, $outputCol, $remarksCol) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("isis", $timeBlock, $status, $output, $remarks);
        if ($stmt->execute()) {
            echo "Time Block $timeBlock saved successfully.";
        } else {
            echo "Insert error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
