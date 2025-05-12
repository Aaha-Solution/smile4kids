<?php
/**
 * Video Upload API Endpoint
 * 
 * This endpoint handles video uploads for the Smile4Kids application.
 * It requires admin authentication and accepts video files along with metadata.
 */

// Set headers for cross-origin requests and JSON response
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Start session for authentication
session_start();

// Include database connection and helper functions
include_once '../config/database.php';
include_once '../models/user.php';

// Check if user is logged in and is an admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    http_response_code(401);
    echo json_encode(array("message" => "Unauthorized. Admin access required."));
    exit();
}

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(array("message" => "Method not allowed. Use POST."));
    exit();
}

// Check if all required fields are present
$required_fields = array('language', 'category', 'title', 'description');
$missing_fields = array();

foreach ($required_fields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        $missing_fields[] = $field;
    }
}

if (!empty($missing_fields)) {
    http_response_code(400);
    echo json_encode(array(
        "message" => "Missing required fields: " . implode(', ', $missing_fields)
    ));
    exit();
}

// Check if file was uploaded
if (!isset($_FILES['video']) || $_FILES['video']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    $error_message = "File upload error: ";
    
    if (!isset($_FILES['video'])) {
        $error_message .= "No file uploaded.";
    } else {
        switch ($_FILES['video']['error']) {
            case UPLOAD_ERR_INI_SIZE:
                $error_message .= "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $error_message .= "The uploaded file exceeds the MAX_FILE_SIZE directive in the HTML form.";
                break;
            case UPLOAD_ERR_PARTIAL:
                $error_message .= "The uploaded file was only partially uploaded.";
                break;
            case UPLOAD_ERR_NO_FILE:
                $error_message .= "No file was uploaded.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $error_message .= "Missing a temporary folder.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $error_message .= "Failed to write file to disk.";
                break;
            case UPLOAD_ERR_EXTENSION:
                $error_message .= "A PHP extension stopped the file upload.";
                break;
            default:
                $error_message .= "Unknown upload error.";
                break;
        }
    }
    
    echo json_encode(array("message" => $error_message));
    exit();
}

// Extract data from request
$language = $_POST['language'];
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];
$file = $_FILES['video'];

// Validate file type
$allowed_types = array('video/mp4', 'video/mpeg', 'video/quicktime', 'video/x-msvideo');
$file_type = $file['type'];

if (!in_array($file_type, $allowed_types)) {
    http_response_code(400);
    echo json_encode(array(
        "message" => "Invalid file type. Allowed types: " . implode(', ', $allowed_types)
    ));
    exit();
}

// Create upload directory if it doesn't exist
$upload_dir = "../uploads/{$language}/{$category}/";
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Generate unique filename
$file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$unique_filename = uniqid() . '_' . time() . '.' . $file_extension;
$target_file = $upload_dir . $unique_filename;

// Move uploaded file to target directory
if (move_uploaded_file($file['tmp_name'], $target_file)) {
    try {
        // Get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // Prepare SQL statement to insert video metadata
        $query = "INSERT INTO videos (title, description, language, category, file_path, uploaded_by, upload_date) 
                  VALUES (:title, :description, :language, :category, :file_path, :uploaded_by, NOW())";
        
        $stmt = $db->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':language', $language);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':file_path', $target_file);
        $stmt->bindParam(':uploaded_by', $_SESSION['user_id']);
        
        // Execute query
        if ($stmt->execute()) {
            http_response_code(201);
            echo json_encode(array(
                "message" => "Video uploaded successfully.",
                "video_id" => $db->lastInsertId(),
                "file_path" => $target_file
            ));
        } else {
            // If database insertion fails, delete the uploaded file
            unlink($target_file);
            
            http_response_code(500);
            echo json_encode(array(
                "message" => "Unable to save video metadata to database."
            ));
        }
    } catch (Exception $e) {
        // If an exception occurs, delete the uploaded file
        unlink($target_file);
        
        http_response_code(500);
        echo json_encode(array(
            "message" => "Database error: " . $e->getMessage()
        ));
    }
} else {
    http_response_code(500);
    echo json_encode(array(
        "message" => "Failed to move uploaded file to target directory."
    ));
}
?>
