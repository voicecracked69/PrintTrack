<?php
// Database connection setup
$host = "localhost";
$username = "root";
$password = "";
$dbname = "printtrack";

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    http_response_code(500);
    die("Connection failed: " . $conn->connect_error);
}

// Check if all required POST parameters exist
if (
    isset($_POST['job_ticket_number']) && 
    isset($_POST['job_name']) && 
    isset($_POST['machine']) && 
    isset($_POST['impression']) &&
    isset($_POST['shift']) // <-- ADDED
) {
    // Sanitize and prepare the data
    $job_ticket_number = trim($_POST['job_ticket_number']);
    $job_name = trim($_POST['job_name']);
    $machine = trim($_POST['machine']);
    $impression = trim($_POST['impression']); // keep as string for VARCHAR
    $shift = trim($_POST['shift']); // <-- ADDED

    // Check if the entry already exists
    $check_sql = "SELECT id FROM hourly_reports WHERE job_ticket_number = ?";
    $check_stmt = $conn->prepare($check_sql);

    if ($check_stmt) {
        $check_stmt->bind_param("s", $job_ticket_number);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result && $check_result->num_rows > 0) {
            // Entry exists
            echo "exists";
        } else {
            // Insert new entry
            $insert_sql = "INSERT INTO hourly_reports (job_ticket_number, job_name, machine, impression, shift) 
                           VALUES (?, ?, ?, ?, ?)"; // <-- UPDATED
            $insert_stmt = $conn->prepare($insert_sql);

            if ($insert_stmt) {
                $insert_stmt->bind_param("sssss", $job_ticket_number, $job_name, $machine, $impression, $shift); // <-- UPDATED

                if ($insert_stmt->execute()) {
                    echo "success";
                } else {
                    http_response_code(500);
                    echo "Error inserting record: " . $insert_stmt->error;
                }
                $insert_stmt->close();
            } else {
                http_response_code(500);
                echo "Error preparing insert statement: " . $conn->error;
            }
        }
        $check_stmt->close();
    } else {
        http_response_code(500);
        echo "Error preparing select statement: " . $conn->error;
    }
} else {
    http_response_code(400); // Bad request
    echo "Missing required parameters.";
}

// Close the database connection
$conn->close();
?>
