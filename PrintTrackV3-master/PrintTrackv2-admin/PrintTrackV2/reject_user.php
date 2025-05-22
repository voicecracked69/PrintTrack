<?php
// reject_user.php

include 'db_connect.php'; // Make sure this file includes your database connection ($conn)

if (isset($_GET['id'])) {
    $bio_id = $_GET['id'];

    // Update the user status to 'rejected'
    $sql = "UPDATE users SET status = 'rejected' WHERE bio_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $bio_id);
        if (mysqli_stmt_execute($stmt)) {
            // Redirect back to the approval page with a success message (optional)
            header("Location: user_approval.php?message=User+rejected+successfully");
            exit();
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
