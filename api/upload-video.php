<?php
// Set higher limits for large file uploads
ini_set('upload_max_filesize', '500M');
ini_set('post_max_size', '500M');
ini_set('memory_limit', '512M');
ini_set('max_execution_time', '300');
ini_set('max_input_time', '300');

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require('../database/dbconfig.php');
session_start();

// Check for upload errors first
if (isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH'] > (int)ini_get('post_max_size') * 1024 * 1024) {
    http_response_code(413); // Payload Too Large
    echo json_encode([
        'success' => false, 
        'message' => 'File upload size exceeds server limit. Maximum allowed size is ' . ini_get('post_max_size') . 'MB'
    ]);
    exit;
}

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

// Process form data
$language = isset($_POST['language']) ? mysqli_real_escape_string($connection, $_POST['language']) : '';
$category = isset($_POST['category']) ? mysqli_real_escape_string($connection, $_POST['category']) : '';
$title = isset($_POST['title']) ? mysqli_real_escape_string($connection, $_POST['title']) : '';
$description = isset($_POST['description']) ? mysqli_real_escape_string($connection, $_POST['description']) : '';

// Validate required fields
if (empty($language) || empty($category)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Language and category are required']);
    exit;
}

// Validate language parameter
$validLanguages = ['Hindi', 'Punjabi', 'Gujarati'];
if (!in_array($language, $validLanguages)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid language. Supported languages are: Hindi, Punjabi, Gujarati']);
    exit;
}

// Validate category parameter
$validCategories = ['PreJunior', 'Junior'];
if (!in_array($category, $validCategories)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid category. Supported categories are: PreJunior, Junior']);
    exit;
}

// Handle file upload
if (!isset($_FILES['video'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Video file is required']);
    exit;
}

// Check for specific upload errors
if ($_FILES['video']['error'] !== UPLOAD_ERR_OK) {
    $error_message = 'File upload error: ';
    switch ($_FILES['video']['error']) {
        case UPLOAD_ERR_INI_SIZE:
            $error_message .= 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $error_message .= 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
            break;
        case UPLOAD_ERR_PARTIAL:
            $error_message .= 'The uploaded file was only partially uploaded';
            break;
        case UPLOAD_ERR_NO_FILE:
            $error_message .= 'No file was uploaded';
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $error_message .= 'Missing a temporary folder';
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $error_message .= 'Failed to write file to disk';
            break;
        case UPLOAD_ERR_EXTENSION:
            $error_message .= 'A PHP extension stopped the file upload';
            break;
        default:
            $error_message .= 'Unknown upload error';
    }
    
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $error_message]);
    exit;
}

// Validate file type
$allowedTypes = ['video/mp4', 'video/avi', 'video/quicktime', 'video/x-ms-wmv'];
if (!in_array($_FILES['video']['type'], $allowedTypes)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid file type. Supported types are: MP4, AVI, MOV, WMV']);
    exit;
}

// Create upload directory if it doesn't exist
$uploadDir = '../hwUploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Generate a unique filename
$filename = $language . '_' . $category . '_' . time() . '_' . $_FILES['video']['name'];
$filename = str_replace(' ', '_', $filename); // Replace spaces with underscores
$filepath = $uploadDir . $filename;
$dbFilePath = 'hwUploads/' . $filename;

// Move uploaded file
if (!move_uploaded_file($_FILES['video']['tmp_name'], $filepath)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
    exit;
}

// Get current date
$currentDate = date('Y-m-d');

// Insert into database
$query = "INSERT INTO videos (language, category, title, filename, file_path, description, upload_date) 
          VALUES ('$language', '$category', '$title', '$filename', '$dbFilePath', '$description', '$currentDate')";

$result = mysqli_query($connection, $query);

if (!$result) {
    // Delete the uploaded file if database insertion fails
    unlink($filepath);
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . mysqli_error($connection)]);
    exit;
}

// Return success response
echo json_encode([
    'success' => true,
    'message' => 'Video uploaded successfully',
    'video' => [
        'id' => mysqli_insert_id($connection),
        'language' => $language,
        'category' => $category,
        'title' => $title,
        'filename' => $filename,
        'filepath' => $dbFilePath,
        'description' => $description,
        'upload_date' => $currentDate,
        'url' => BASE_URL . $dbFilePath
    ]
]);
