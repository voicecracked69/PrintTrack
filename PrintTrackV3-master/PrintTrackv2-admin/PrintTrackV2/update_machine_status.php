<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "printtrack";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo "Database connection failed";
    exit;
}

if (isset($_POST['job_ticket_number'], $_POST['machine_status'])) {
    $job_ticket_number = $conn->real_escape_string($_POST['job_ticket_number']);
    $machine_status = $conn->real_escape_string($_POST['machine_status']);

    $sql = "UPDATE machines SET machine_status = '$machine_status' WHERE job_ticket_number = '$job_ticket_number'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Success";
    } else {
        http_response_code(500);
        echo "Update failed";
    }
} else {
    http_response_code(400);
    echo "Invalid input";
}

$conn->close();
?>
