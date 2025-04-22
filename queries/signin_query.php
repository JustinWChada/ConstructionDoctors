<?php
// signin_query.php
session_start(); // Start the session

require "db_users.php"; // Include database connection

// Retrieve data from the AJAX request
$email = $_POST['email'];
$password = $_POST['password'];

// Validate data
if (empty($email) || empty($password)) {
    $response = array('success' => false, 'message' => 'Email and password are required.');
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Prepare and execute the SQL query to retrieve user data
$sql = "SELECT user_id, user_password, first_name FROM users WHERE email = ?";
$stmt = $UsersConn->prepare($sql);

if ($stmt === false) {
    $response = array('success' => false, 'message' => 'Prepare failed: ' . $UsersConn->error);
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['user_password'];

    // Verify the password
    if (password_verify($password, $hashed_password)) {
        // Password is correct
        $_SESSION['user_id'] = $row['user_id']; // Store user_id in the session
        $_SESSION['first_name'] = $row['first_name']; // Store first_name (optional)
        $_SESSION['email'] = $email; // Store email in the session (optional)
        $_SESSION['last_activity'] = time();
        $response = array('success' => true, 'message' => 'Sign-in successful.');

    } else {
        // Incorrect password
        $response = array('success' => false, 'message' => 'Incorrect email or password.');
    }
} else {
    // No user found with that email
    $response = array('success' => false, 'message' => 'Incorrect email or password.');
}

$stmt->close();

header('Content-Type: application/json');
echo json_encode($response);