<?php
session_start(); // Start session if needed

// Check if a redirect target is provided
if (isset($_GET['target'])) {
    $target = $_GET['target'];
} else {
    $target = '/Dashboard/report.php'; // Default redirection if no target is specified
}

// Perform the redirection
header("Location: $target");
exit();
?>
