<?php
// Include your DB connection
include('db_connect.php'); // Adjust this to your actual DB connection

// Check if the job_ticket_number is passed in the POST request
if (isset($_POST['job_ticket_number'])) {
    $jobTicketNumber = $_POST['job_ticket_number'];

    // Query to fetch the report information
    $query = "SELECT * FROM reports WHERE job_ticket_number = '$jobTicketNumber'"; // Replace "reports" with your actual table name
    $result = mysqli_query($conn, $query);

    // Check if the record is found
    if ($row = mysqli_fetch_assoc($result)) {
        // Return all the data as a JSON response
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "Report not found"]);
    }
} else {
    echo json_encode(["error" => "No job ticket number provided"]);
}
?>
