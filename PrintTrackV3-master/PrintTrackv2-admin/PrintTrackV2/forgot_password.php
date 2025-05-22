<!--<?php
// Include the database connection
include('db_config.php');

// Process the form when it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Generate a unique token for the password reset
            $token = bin2hex(random_bytes(50)); // Generate a random token

            // Insert the token into the database, with an expiration time
            $expiry_time = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token valid for 1 hour
            $update_sql = "UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?";
            if ($update_stmt = $conn->prepare($update_sql)) {
                $update_stmt->bind_param("sss", $token, $expiry_time, $email);
                $update_stmt->execute();

                // Send the reset email to the user
                $reset_link = "http://yourdomain.com/reset_password.php?token=$token"; // Replace with your actual domain
                $subject = "Password Reset Request";
                $message = "To reset your password, click the link below:\n$reset_link";
                $headers = "From: no-reply@yourdomain.com";

                if (mail($email, $subject, $message, $headers)) {
                    echo "<script>alert('A password reset link has been sent to your email.');</script>";
                } else {
                    echo "<script>alert('Failed to send the reset email.');</script>";
                }
            }
        } else {
            echo "<script>alert('No account found with that email address.');</script>";
        }
        $stmt->close();
    }
}

$conn->close();
?>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .signup-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        
        /* Responsive design */
        @media (max-width: 480px) {
            .signup-container {
                padding: 15px;
            }
            input, .btn {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="signup-container">
        <h2>Forgot Password</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Send Reset Link</button>
            </div>
        </form>
    </div>

</body>
</html>
