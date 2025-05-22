<?php
require_once 'db_connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $data = $_POST;
        $id = intval($data['id']);
        
        $stmt = $pdo->prepare("UPDATE hourly_reports SET 
            total_output = ?,
            general_remarks = ?,
            shift_done = ?,
            last_update = CURRENT_TIMESTAMP
            WHERE id = ?");
        
        $stmt->execute([
            $data['total_output'],
            $data['general_remarks'],
            $data['shift_done'],
            $id
        ]);
        
        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>