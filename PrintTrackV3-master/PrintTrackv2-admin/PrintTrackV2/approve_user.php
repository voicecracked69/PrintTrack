<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bio_id = $_POST['bio_id'];
    $user_type = $_POST['user_type'];

    $sql = "UPDATE users SET status = 'approved', role = ? WHERE bio_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $user_type, $bio_id);

    if ($stmt->execute()) {
        header("Location: user_approval.php"); // Replace with your actual admin page
        exit();
    } else {
        echo "Error approving user: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
