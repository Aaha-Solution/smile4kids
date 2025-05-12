<?php
/**
 * Delete Video API Endpoint
 * 
 * This endpoint handles video deletion for the Smile4Kids application.
 * It requires admin authentication and deletes videos by ID.
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

// Check if video ID is provided
if (!isset($_POST['id']) || empty($_POST['id'])) {
    http_response_code(400);
    echo json_encode(array("message" => "Missing required parameter: id"));
    exit();
}

$video_id = $_POST['id'];

try {
    // Get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // First, get the file path to delete the physical file
    $query = "SELECT file_path FROM videos WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $video_id);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $file_path = $row['file_path'];
        
        // Delete the record from the database
        $delete_query = "DELETE FROM videos WHERE id = :id";
        $delete_stmt = $db->prepare($delete_query);
        $delete_stmt->bindParam(':id', $video_id);
        
        if ($delete_stmt->execute()) {
            // Delete the physical file if it exists
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            http_response_code(200);
            echo json_encode(array("message" => "Video deleted successfully."));
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Failed to delete video from database."));
        }
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Video not found."));
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array("message" => "Database error: " . $e->getMessage()));
}
?>
