<?php
header('Content-Type: application/json');
require('../database/dbconfig.php');
session_start();

$data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
$otp = $data['otp'] ?? '';
$new_password = $data['new_password'] ?? '';

if (!$otp || !$new_password) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'OTP and new password are required']);
    exit;
}

$timestamp = $_SERVER["REQUEST_TIME"];

// Verify OTP
if (isset($_SESSION['session_otp']) && $_SESSION['session_otp'] == $otp && ($timestamp - $_SESSION['time']) < 300) {
    // Update OTP status
    $updateOtp = "UPDATE otp_expiry SET is_expired = 1 WHERE otp = '$otp'";
    mysqli_query($connection, $updateOtp);

    // Update password
    $email = $_SESSION['sesMail'];
    $updatePwd = "UPDATE students SET password = '$new_password' WHERE email = '$email'";
    $result = mysqli_query($connection, $updatePwd);

    if ($result) {
        // Clear session
        unset($_SESSION['session_otp']);
        unset($_SESSION['sesMail']);
        unset($_SESSION['time']);

        echo json_encode([
            'success' => true,
            'message' => 'Password reset successfully'
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Failed to update password']);
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid or expired OTP']);
} 