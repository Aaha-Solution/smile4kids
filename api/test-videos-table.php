<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require('../database/dbconfig.php');

// Check if the videos table exists
$tableCheckQuery = "SHOW TABLES LIKE 'videos'";
$tableCheckResult = mysqli_query($connection, $tableCheckQuery);
$tableExists = mysqli_num_rows($tableCheckResult) > 0;

// Get database info
$dbInfo = [
    'server' => $server_name,
    'database' => $db_name,
    'base_url' => BASE_URL,
    'videos_table_exists' => $tableExists
];

// Try to create the table if it doesn't exist
$tableCreated = false;
$createError = null;

if (!$tableExists) {
    $createTableQuery = "CREATE TABLE `videos` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `language` varchar(50) NOT NULL COMMENT 'Hindi, Panjabi, Gujarati',
        `category` varchar(50) NOT NULL COMMENT 'prejunior, junior',
        `title` varchar(255) DEFAULT NULL,
        `filename` varchar(255) NOT NULL,
        `file_path` varchar(255) NOT NULL,
        `description` text DEFAULT NULL,
        `upload_date` date DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
    
    $tableCreated = mysqli_query($connection, $createTableQuery);
    
    if (!$tableCreated) {
        $createError = mysqli_error($connection);
    }
}

// Check PHP configuration
$phpConfig = [
    'upload_max_filesize' => ini_get('upload_max_filesize'),
    'post_max_size' => ini_get('post_max_size'),
    'memory_limit' => ini_get('memory_limit'),
    'max_execution_time' => ini_get('max_execution_time'),
    'max_input_time' => ini_get('max_input_time')
];

// Return response
echo json_encode([
    'success' => true,
    'message' => 'API test successful',
    'database_info' => $dbInfo,
    'table_created' => $tableCreated,
    'create_error' => $createError,
    'php_config' => $phpConfig,
    'api_endpoints' => [
        'get_videos' => BASE_URL . 'api/get-videos.php?language=Hindi&category=PreJunior',
        'get_video' => BASE_URL . 'api/get-video.php?id=1',
        'upload_video' => BASE_URL . 'api/upload-video.php',
        'delete_video' => BASE_URL . 'api/delete-video.php'
    ]
]);
