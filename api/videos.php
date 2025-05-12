<?php
/**
 * Videos API Endpoint
 * 
 * This endpoint handles video retrieval for the Smile4Kids application.
 * It allows filtering videos by language and category.
 */

// Set headers for cross-origin requests and JSON response
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Start session for authentication if needed
session_start();

// Include database connection and helper functions
include_once '../config/database.php';

// Check if request method is GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(array("message" => "Method not allowed. Use GET."));
    exit();
}

// Get query parameters
$language = isset($_GET['language']) ? $_GET['language'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Validate parameters
if (!$language || !$category) {
    http_response_code(400);
    echo json_encode(array("message" => "Missing required parameters: language and category are required."));
    exit();
}

try {
    // Get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // Prepare SQL statement to fetch videos
    $query = "SELECT id, title, description, language, category, file_path, upload_date 
              FROM videos 
              WHERE language = :language AND category = :category
              ORDER BY upload_date DESC";
    
    $stmt = $db->prepare($query);
    
    // Bind parameters
    $stmt->bindParam(':language', $language);
    $stmt->bindParam(':category', $category);
    
    // Execute query
    $stmt->execute();
    
    // Check if any videos found
    if ($stmt->rowCount() > 0) {
        // Initialize array for videos
        $videos_arr = array();
        $videos_arr["records"] = array();
        
        // Fetch videos
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            
            $video_item = array(
                "id" => $id,
                "title" => $title,
                "description" => $description,
                "language" => $language,
                "category" => $category,
                "file_path" => $file_path,
                "upload_date" => $upload_date
            );
            
            array_push($videos_arr["records"], $video_item);
        }
        
        // Set response code and output videos
        http_response_code(200);
        echo json_encode($videos_arr);
    } else {
        // No videos found
        http_response_code(404);
        echo json_encode(array("message" => "No videos found for the specified language and category."));
    }
} catch (Exception $e) {
    // Database error
    http_response_code(500);
    echo json_encode(array("message" => "Database error: " . $e->getMessage()));
}
?>
