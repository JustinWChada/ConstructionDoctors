<?php
// PHP (contact_query.php)

require_once 'db_management.php'; // Ensure this file establishes the $MgtConn connection.

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = isset($_POST["name"]) ? trim($_POST["name"]) : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $countryCode = isset($_POST["countryCode"]) ? trim($_POST["countryCode"]) : '';
    $phoneNumber = isset($_POST["phoneNumber"]) ? trim($_POST["phoneNumber"]) : '';
    $subject = isset($_POST["subject"]) ? trim($_POST["subject"]) : '';
    $message = isset($_POST["message"]) ? trim($_POST["message"]) : '';
    $status = 0;
    $created_at = date("Y-m-d H:i:s");

    // Data Validation
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
        exit;
    }

    // Sanitize Data
    $name = mysqli_real_escape_string($MgtConn, $name);
    $email = mysqli_real_escape_string($MgtConn, $email);
    $countryCode = mysqli_real_escape_string($MgtConn, $countryCode);
    $phoneNumber = mysqli_real_escape_string($MgtConn, $phoneNumber);
    $subject = mysqli_real_escape_string($MgtConn, $subject);
    $message = mysqli_real_escape_string($MgtConn, $message);

    // SQL Insertion
    $sql = "INSERT INTO contact_messages (name, contact_email, contact_country_code, contact_phone_number, contact_subject, contact_message, created_at, contact_status) VALUES ('$name', '$email', '$countryCode', '$phoneNumber', '$subject', '$message','$created_at', '$status')";

    if (mysqli_query($MgtConn, $sql)) {
        echo json_encode(['success' => true, 'message' => "Your request has been successfully sent!"]);
    } else {
        error_log("MySQL Error: " . mysqli_error($MgtConn)); // Log the error
        echo json_encode(['success' => false, 'message' => 'Error saving message.  Please try again.' . mysqli_error($MgtConn)]);
    }

    mysqli_close($MgtConn);

} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>