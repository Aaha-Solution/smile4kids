<?php
header('Content-Type: application/json');
require('../database/dbconfig.php');
session_start();

$data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
$email = $data['email'] ?? '';

if (!$email) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Email is required']);
    exit;
}

// Check if email exists
$query = "SELECT * FROM students WHERE email = '$email'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    // Generate OTP
    $otp = rand(100000, 999999);
    $_SESSION['session_otp'] = $otp;
    $_SESSION['sesMail'] = $email;
    $timestamp = $_SERVER["REQUEST_TIME"];
    $_SESSION['time'] = $timestamp;

    // Send OTP via email
    require_once(__DIR__ . "/../forgotOtpMail.php");
    $mail_status = sendOTP($email, $otp);

    if ($mail_status == 1) {
        // Store OTP in database
        $insertOtp = "INSERT INTO otp_expiry(email, otp, is_expired) VALUES ('$email', '$otp', 0)";
        $result = mysqli_query($connection, $insertOtp);

        if ($result) {
            echo json_encode([
                'success' => true,
                'message' => 'OTP sent successfully',
                'expires_in' => 300 // 5 minutes in seconds
            ]);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Failed to store OTP']);
        }
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Failed to send OTP email']);
    }
} else {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Email not found']);
} 