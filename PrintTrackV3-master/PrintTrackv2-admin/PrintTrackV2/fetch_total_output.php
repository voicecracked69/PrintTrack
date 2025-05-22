<?php
if (isset($_POST['id'])) {
    require "db_connect.php";

    $id = intval($_POST['id']);

    $sql = "SELECT 
                (IFNULL(output_1, 0) + IFNULL(output_2, 0) + IFNULL(output_3, 0) +
                 IFNULL(output_4, 0) + IFNULL(output_5, 0) + IFNULL(output_6, 0) +
                 IFNULL(output_7, 0) + IFNULL(output_8, 0) + IFNULL(output_9, 0) +
                 IFNULL(output_10, 0)) AS total_output 
            FROM hourly_reports 
            WHERE id = $id";

    $result = $conn->query($sql);

    $data = ['total_output' => 0];

    if ($result && $row = $result->fetch_assoc()) {
        $data['total_output'] = $row['total_output'];
    }

    echo json_encode($data);
    $conn->close();
}
?>
