<?php
// Database connection
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $machine = $_POST['machine'];
    $job_ticket_number = $_POST['job_ticket_number'];
    $job_name = $_POST['job_name'];
    $rcl_code = $_POST['rcl_code'];
    $impression = $_POST['impression'];
    $shift = $_POST['shift'];
    $line_supervisor = $_POST['line_supervisor'];
    $operator = $_POST['operator'];
    $helper = $_POST['helper'];
    $qa_inspector = $_POST['qa_inspector'];
    $date = $_POST['date'];

    // Insert data into the database
    $sql = "INSERT INTO reports (machine, job_ticket_number, job_name, rcl_code, impression, shift, line_supervisor, operator, helper, qa_inspector, date) 
            VALUES ('$machine', '$job_ticket_number', '$job_name', '$rcl_code', '$impression', '$shift', '$line_supervisor', '$operator', '$helper', '$qa_inspector', '$date')";

    if (mysqli_query($conn, $sql)) {
        echo 'success';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
