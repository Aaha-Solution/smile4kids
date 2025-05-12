<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require('../database/dbconfig.php');

// Get parameters
$language = isset($_GET['language']) ? mysqli_real_escape_string($connection, $_GET['language']) : '';
$category = isset($_GET['category']) ? mysqli_real_escape_string($connection, $_GET['category']) : '';

// Validate parameters
if (empty($language)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Language parameter is required']);
    exit;
}

// Validate language parameter
$validLanguages = ['Hindi', 'Punjabi', 'Gujarati'];
if (!in_array($language, $validLanguages)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid language. Supported languages are: Hindi, Punjabi, Gujarati']);
    exit;
}

// Validate category parameter if provided
if (!empty($category)) {
    $validCategories = ['PreJunior', 'Junior'];
    if (!in_array($category, $validCategories)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid category. Supported categories are: PreJunior, Junior']);
        exit;
    }
}

// Build the query
$query = "SELECT * FROM videos WHERE language = '$language'";

if (!empty($category)) {
    $query .= " AND category = '$category'";
}

// Execute the query
$result = mysqli_query($connection, $query);

if (!$result) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($connection)]);
    exit;
}

// Fetch results
$videos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $videos[] = [
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
    ];
}

// Return response
echo json_encode([
    'success' => true,
    'count' => count($videos),
    'videos' => $videos
]);
