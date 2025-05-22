<?php
// Include database connection file
include 'db_connect.php';
session_start(); // Start session

// Get the user id from the URL
$user_id = $_GET['user_id'] ?? '';

if ($user_id) {
    // Query to get fullname and role
    $stmt = $conn->prepare("SELECT fullname, role FROM users WHERE userid = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($full_name, $role);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        // Set session variables
        $_SESSION['fullname'] = $full_name;
        $_SESSION['role'] = $role;
    } else {
        $full_name = 'User';
    }

    $stmt->close();
    $conn->close();
} else {
    $full_name = 'User';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome!</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #eceff1, #cfd8dc);
    }

    .welcome-container {
      text-align: center;
      padding: 30px;
      background: linear-gradient(145deg, #ffffff, #e0e0e0);
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
      max-width: 650px;
      animation: fadeIn 1s ease-out;
      position: relative;
    }

    .greeting-icon {
      width: 70px;
      height: 70px;
      color: #4caf50;
      margin-bottom: 20px;
      animation: pulse 2s infinite;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); color: #66bb6a; }
    }

    h1 {
      margin: 15px 0;
      font-weight: 700;
      color: #333;
      font-size: 1.8em;
    }

    p {
      margin: 8px 0;
      font-weight: 400;
      color: #444;
      font-size: 1em;
    }

    .back-button {
      color:  #673ab7;
      font-size: 1em;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 20px;
      text-decoration: none;
    }

    .facebook-icon {
      background-color: #1877F2;
      color: white;
      width: 30px;
      height: 30px;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      border-radius: 5px;
      font-size: 14px;
      text-decoration: none;
    }

    .facebook-link {
      color: #1877F2;
      text-decoration: none;
      font-weight: bold;
    }

    .facebook-link:hover {
      text-decoration: underline;
    }

    .success-message {
      color: #4caf50;
      font-weight: bold;
      margin-top: 10px;
    }

  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
  <div class="welcome-container">
    <svg class="greeting-icon" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0-3.866-3.582-7-8-7S5 6.134 5 10c0 3.6 2.4 6.622 5.6 7.44L12 21l1.4-3.56C18.6 16.622 21 13.6 21 10z"/></svg>
    <h1>Welcome, <?php echo htmlspecialchars($full_name); ?>!</h1>
<p>Your account has been successfully created. Please wait for admin approval before you can log in or access the system.</p>

    </p>
    <p class="success-message">We’re thrilled to have you onboard! 🎉</p>
    <a href="logout.php" class="back-button">Go to Login</a>
  </div>
</body>
</html>
