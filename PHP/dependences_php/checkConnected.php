<?php
require '..\database.php';

header('Content-Type: application/json');

try {
    // Query to count connected users
    $stmt = $pdo->query("SELECT COUNT(*) AS count FROM users WHERE active = 1");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(['count' => $result['count']]);
} catch (Exception $e) {
    echo json_encode(['error' => 'Error while fetching the count of connected users.']);
}
