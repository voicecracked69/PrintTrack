<?php
// view_attachment.php

// Database connection
require 'db_connect.php'; // Ensure this contains your database credentials and connection

if (!isset($_GET['job_ticket_number'])) {
    die("No job ticket number provided.");
}

$jobTicketNumber = $_GET['job_ticket_number'];

// Fetch attachment file name from the database
$stmt = $conn->prepare("SELECT attachment FROM requests WHERE job_ticket_number = ?");
$stmt->bind_param("s", $jobTicketNumber);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $attachmentFile = $row['attachment'];

    // Define the path where attachments are stored
    $filePath = 'uploads/' . $attachmentFile;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Get file type
        $fileType = mime_content_type($filePath);

        // Output file headers
        header("Content-Type: $fileType");
        header("Content-Disposition: inline; filename=\"" . basename($filePath) . "\"");
        header("Content-Length: " . filesize($filePath));

        // Output file content
        readfile($filePath);
        exit;
    } else {
        echo "Attachment not found on the server.";
    }
} else {
    echo "No attachment found for this job ticket.";
}

$stmt->close();
$conn->close();
?>
