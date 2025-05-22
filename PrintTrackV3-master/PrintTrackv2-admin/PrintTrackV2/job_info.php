<?php
$conn = new mysqli("localhost", "root", "", "printtrack");

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Connection failed']);
    exit;
}

$job_id = $_GET['id'] ?? null;

if ($job_id) {
    $stmt = $conn->prepare("SELECT * FROM jobs WHERE job_ticket_number = ?");
    $stmt->bind_param("s", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $job = $result->fetch_assoc();

    if ($job) {
        // Manually set null for missing fields so you can debug
        $response = [
            'job_ticket_number' => $job['job_ticket_number'] ?? '',
            'job_name' => $job['job_name'] ?? '',
            'customer_name' => $job['customer_name'] ?? '',
            'material' => $job['material'] ?? 'Not Found',
            'rcl_code' => $job['rcl_code'] ?? '',
            'color' => $job['color'] ?? 'Not Found',
            'number_of_colors' => $job['number_of_colors'] ?? '',
            'sheet_size' => $job['sheet_size'] ?? '',
            'pieces_size' => $job['pieces_size'] ?? '',
            'grain_direction' => $job['grain_direction'] ?? '',
            'impression' => $job['impression'] ?? 'Not Found',
            'number_of_outs' => $job['number_of_outs'] ?? ''
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        echo json_encode(['error' => 'Job not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid ID']);
}
?>
