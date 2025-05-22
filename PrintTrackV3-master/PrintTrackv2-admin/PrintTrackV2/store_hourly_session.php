<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("localhost", "root", "", "printtrack");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $job_ticket_number = $conn->real_escape_string($_POST['job_ticket_number']);
    $job_name = $conn->real_escape_string($_POST['job_name']);
    $machine = $conn->real_escape_string($_POST['machine']);
    $impression = (int)$_POST['impression'];

    $sql = "INSERT INTO hourly_reports (job_ticket_number, job_name, machine, impression)
            VALUES ('$job_ticket_number', '$job_name', '$machine', $impression)";

    if ($conn->query($sql) === TRUE) {
        echo "Stored successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
