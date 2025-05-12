<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require('../database/dbconfig.php');

// Get video ID parameter
$videoId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Validate video ID
if ($videoId <= 0) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Valid video ID is required']);
    exit;
}

// Build the query
$query = "SELECT * FROM videos WHERE id = $videoId";

// Execute the query
$result = mysqli_query($connection, $query);

if (!$result) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($connection)]);
    exit;
}

// Check if video exists
if (mysqli_num_rows($result) === 0) {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Video not found']);
    exit;
}

// Fetch video data
$row = mysqli_fetch_assoc($result);

// Check if it's a video file
$fileExtension = strtolower(pathinfo($row['filename'], PATHINFO_EXTENSION));
$videoExtensions = ['mp4', 'avi', 'mov', 'wmv'];

if (!in_array($fileExtension, $videoExtensions)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'The specified ID is not for a video file']);
    exit;
}

// Return video data
echo json_encode([
    'success' => true,
    'video' => [
        'id' => $row['id'],
        'language' => $row['language'],
        'category' => $row['category'],
        'title' => $row['title'] ?: pathinfo($row['filename'], PATHINFO_FILENAME),
        'filename' => $row['filename'],
        'filepath' => $row['file_path'],
        'description' => $row['description'],
        'upload_date' => $row['upload_date'],
        'created_at' => $row['created_at'],
        'updated_at' => $row['updated_at'],
        'url' => BASE_URL . $row['file_path']
    ]
]);
