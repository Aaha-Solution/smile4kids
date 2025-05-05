<?php
header('Content-Type: application/json');
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    echo json_encode([
        'success' => true,
        'user' => [
            'id' => $_SESSION['id'],
            'name' => $_SESSION['name'],
            // ... add other session info as needed
        ]
    ]);
} else {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
} 