<?php
$conn = new mysqli("localhost", "root", "", "printtrack");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM plates ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['job_ticket_number']) . "</td>";
        echo "<td>" . htmlspecialchars($row['job_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['job_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['color']) . "</td>";
        echo "<td>" . htmlspecialchars($row['shift']) . "</td>";
        echo "<td>" . htmlspecialchars($row['job_status']) . "</td>";
        echo "<td>" . htmlspecialchars($row['plate_status']) . "</td>";
        echo "<td>
                <button class='btn btn-info btn-sm viewJobInfo' data-id='" . htmlspecialchars($row['job_ticket_number']) . "'>Info</button>
                <button class='btn btn-warning btn-sm editJobBtn' data-id='" . htmlspecialchars($row['job_ticket_number']) . "'>Edit</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found.</td></tr>";
}

$conn->close();
?>
