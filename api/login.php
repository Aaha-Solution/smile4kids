<?php
header('Content-Type: application/json');
require('../database/dbconfig.php');
session_start();

$data = json_decode(file_get_contents('php://input'), true) ?? $_POST;

$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

if ($username && $password) {
    $uname = mysqli_real_escape_string($connection, $username);
    $pwd = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM students WHERE email = '$uname' AND password ='$pwd'";
    $query_run = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($query_run);

    if (empty($row)) {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Invalid Login Credentials!']);
        exit;
    }

    // Set session variables as needed
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['fname'];
    $_SESSION['logged_in'] = true;
    // ... add other session variables as needed

    echo json_encode([
        'success' => true,
        'message' => 'Login successful',
        'user' => [
            'id' => $row['id'],
            'name' => $row['fname'],
            'email' => $row['email'],
            'role' => $row['role'],
            // ... add other fields as needed
        ]
    ]);
    exit;
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Username and password required']);
    exit;
} 