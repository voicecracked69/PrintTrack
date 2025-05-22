<?php
// DB connection
$host = 'localhost';
$db   = 'printtrack';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed.']);
    exit;
}

// Validate input
if (!isset($_GET['request_id']) || !is_numeric($_GET['request_id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request ID.']);
    exit;
}

$request_id = intval($_GET['request_id']);

// Query the request types and statuses
$stmt = $pdo->prepare("SELECT request_type, status FROM requests WHERE request_id = ?");
$stmt->execute([$request_id]);
$requestTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return JSON
header('Content-Type: application/json');
echo json_encode($requestTypes);
?>
