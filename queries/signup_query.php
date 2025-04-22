<?php
// signup_query.php

//error_reporting(E_ALL); //REMOVE THIS ONCE DEBUGGED
//ini_set('display_errors', 1); //REMOVE THIS ONCE DEBUGGED

require "db_users.php";

// Retrieve data from the AJAX request
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$created = date("Y-m-d H:i:s");
$updated = date("Y-m-d H:i:s");
$false = 0; // Or 0 for false;  if using default values, no need for this

// Validate data (add more validation as needed)
if (empty($name) || empty($email) || empty($password)) {
    $response = array('success' => false, 'message' => 'All fields are required.');
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Check if email already exists
$sql_check_email = "SELECT user_id FROM users WHERE email = ?";
$stmt_check_email = $UsersConn->prepare($sql_check_email);

if ($stmt_check_email === false) {
    $response = array('success' => false, 'message' => 'Prepare failed (email check): ' . $UsersConn->error);
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$stmt_check_email->bind_param("s", $email);
$stmt_check_email->execute();
$stmt_check_email->store_result(); // Store the result to get num_rows

if ($stmt_check_email->num_rows > 0) {
    $response = array('success' => false, 'message' => 'Email already exists. Please use a different email address.');
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$stmt_check_email->close();

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the SQL query
$sql = "INSERT INTO users (user_password, email, first_name, created_at, updated_at, is_active) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $UsersConn->prepare($sql);

if ($stmt === false) {
    $response = array('success' => false, 'message' => 'Prepare failed: ' . $UsersConn->error);
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$stmt->bind_param("sssssi", $hashed_password, $email, $name, $created, $updated, $false); // Changed to ssssi if int

if ($stmt->execute()) {
    $response = array('success' => true, 'message' => 'User registered successfully.');
} else {
    $response = array('success' => false, 'message' => 'Error registering user: ' . $stmt->error);
}

$stmt->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>