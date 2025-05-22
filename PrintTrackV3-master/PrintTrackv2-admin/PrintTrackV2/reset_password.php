<!--<?php
// Include the database connection
include('db_connect.php');

// Process the form when it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $token = $_GET['token'];  // Get the token from the URL

    if ($new_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Check if the token exists and is still valid
        $sql = "SELECT * FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Token is valid, reset the password
                $update_sql = "UPDATE users SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE reset_token = ?";
                if ($update_stmt = $conn->prepare($update_sql)) {
                    $update_stmt->bind_param("ss", $hashed_password, $token);
                    if ($update_stmt->execute()) {
                        echo "<script>alert('Your password has been updated successfully!');</script>";
                    } else {
                        echo "<script>alert('Error updating password.');</script>";
                    }
                }
            } else {
                echo "<script>alert('Invalid or expired token.');</script>";
            }
        }
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
    <title>Reset Password</title>
    <style>
        *{
           padding: 0;
           margin: 0;
           font-family: "Poppins", sans-serif;
           font-weight: 600; 
        }    

        body {
            font-family: "Poppins", sans-serif;
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
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #218838;
        }
        
        /* Responsive design */
        @media (max-width: 480px) {
            .signup-container {
                padding: 15px;
            }
            input, .btn {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <div class="signup-container">
        <h2>Reset Password</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Reset Password</button>
            </div>
        </form>
    </div>

</body>
</html>

