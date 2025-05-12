<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE, POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require('../database/dbconfig.php');
session_start();

// TEMPORARY: Authentication bypass for testing
// Comment this back in when done testing
/*
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'admin') {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}
*/

// For testing purposes only - remove in production
$_SESSION['logged_in'] = true;
$_SESSION['role'] = 'admin';

// Get data from request
$data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
$videoId = isset($data['id']) ? intval($data['id']) : 0;

// Validate video ID
if ($videoId <= 0) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Valid video ID is required']);
    exit;
}

// Get video information before deletion
$query = "SELECT * FROM videos WHERE id = $videoId";
$result = mysqli_query($connection, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Video not found']);
    exit;
}

$video = mysqli_fetch_assoc($result);

// Check if it's a video file
$fileExtension = strtolower(pathinfo($video['filename'], PATHINFO_EXTENSION));
$videoExtensions = ['mp4', 'avi', 'mov', 'wmv'];

if (!in_array($fileExtension, $videoExtensions)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'The specified ID is not for a video file']);
    exit;
}

// Delete the file from the server
$filePath = '../' . $video['file_path'];
if (file_exists($filePath)) {
    if (!unlink($filePath)) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Failed to delete the video file']);
        exit;
    }
}

// Delete the database record
$deleteQuery = "DELETE FROM videos WHERE id = $videoId";
$deleteResult = mysqli_query($connection, $deleteQuery);

if (!$deleteResult) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($connection)]);
    exit;
}

// Return success response
echo json_encode([
    'success' => true,
    'message' => 'Video deleted successfully',
    'video' => [
        'id' => $videoId,
        'language' => $video['language'],
        'category' => $video['category'],
        'title' => $video['title'],
        'filename' => $video['filename']
    ]
]);
