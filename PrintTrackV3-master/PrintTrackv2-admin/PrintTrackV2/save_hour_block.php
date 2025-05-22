<?php
include 'db_connect.php'; // your DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $block = (int)$_POST['block']; // 1 to 12
    $status = $_POST['status'];
    $output = (int)$_POST['output'];
    $remarks = $_POST['remarks'];

    // Identify the record — add your WHERE condition here
    $whereClause = "WHERE your_condition_here"; // Example: "WHERE report_id = 123"

    // Validate block number
    if ($block < 1 || $block > 12) {
        die("Invalid block number.");
    }

    // Column names
    $statusCol = "status_$block";
    $outputCol = "output_$block";
    $remarksCol = "remarks_$block";

    // Update the specific time block
    $sql = "UPDATE hourly_reports SET 
        `$statusCol` = ?, 
        `$outputCol` = ?, 
        `$remarksCol` = ?
        $whereClause";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $status, $output, $remarks);

    if ($stmt->execute()) {
        // Recalculate total output
        $totalSql = "SELECT 
            COALESCE(output_1, 0) + COALESCE(output_2, 0) + COALESCE(output_3, 0) +
            COALESCE(output_4, 0) + COALESCE(output_5, 0) + COALESCE(output_6, 0) +
            COALESCE(output_7, 0) + COALESCE(output_8, 0) + COALESCE(output_9, 0) +
            COALESCE(output_10, 0) + COALESCE(output_11, 0) + COALESCE(output_12, 0)
            AS total_output FROM hourly_reports $whereClause";

        $result = $conn->query($totalSql);
        $row = $result->fetch_assoc();
        $total = $row['total_output'];

        // Update total_output field
        $conn->query("UPDATE hourly_reports SET total_output = $total $whereClause");

        echo "Block $block updated. New total output: $total";
    } else {
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
