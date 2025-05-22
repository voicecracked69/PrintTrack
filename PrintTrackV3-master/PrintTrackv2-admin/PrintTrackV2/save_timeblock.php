<?php
require 'db_connect.php';

header('Content-Type: text/plain');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize inputs
    $blockNum = isset($_POST['block_num']) ? intval($_POST['block_num']) : 0;
    if ($blockNum < 1 || $blockNum > 12) {
        http_response_code(400);
        die("Invalid time block number");
    }

    $required = ['job_ticket_number', 'job_name', 'machine', 'impression', 'status'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            http_response_code(400);
            die("Missing required field: $field");
        }
    }

    // Prepare data
    $job_ticket_number = $conn->real_escape_string($_POST['job_ticket_number']);
    $job_name = $conn->real_escape_string($_POST['job_name']);
    $machine = $conn->real_escape_string($_POST['machine']);
    $impression = $conn->real_escape_string($_POST['impression']);
    $status = $conn->real_escape_string($_POST['status']);
    $output = isset($_POST['output']) ? intval($_POST['output']) : 0;
    $remarks = isset($_POST['remarks']) ? $conn->real_escape_string($_POST['remarks']) : '';

    try {
        // Check for existing record
        $checkSql = "SELECT id FROM hourly_reports WHERE job_ticket_number = '$job_ticket_number' LIMIT 1";
        $result = $conn->query($checkSql);
        
        if ($result->num_rows > 0) {
            // Update existing record
            $row = $result->fetch_assoc();
            $id = $row['id'];
            
            $updateSql = "UPDATE hourly_reports SET 
                job_name = '$job_name',
                machine = '$machine',
                impression = '$impression',
                status_$blockNum = '$status',
                output_$blockNum = $output,
                remarks_$blockNum = '$remarks',
                last_update = CURRENT_TIMESTAMP()
                WHERE id = $id";
                
            if ($conn->query($updateSql)) {
                echo "Success";
            } else {
                throw new Exception("Update Error: " . $conn->error);
            }
        } else {
            // Insert new record
            $insertSql = "INSERT INTO hourly_reports (
                job_ticket_number, job_name, machine, impression, 
                status_$blockNum, output_$blockNum, remarks_$blockNum
            ) VALUES (
                '$job_ticket_number', '$job_name', '$machine', '$impression',
                '$status', $output, '$remarks'
            )";
            
            if ($conn->query($insertSql)) {
                echo "Success";
            } else {
                throw new Exception("Insert Error: " . $conn->error);
            }
        }
    } catch (Exception $e) {
        http_response_code(500);
        die($e->getMessage());
    } finally {
        $conn->close();
    }
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>