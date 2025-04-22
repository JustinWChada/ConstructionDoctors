<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enquiry = $_POST['enquiry'];
    $userId = $_SESSION['user']['id']; // Assuming user ID is stored in session

    // Save enquiry to database
    // Database connection code here
    // $stmt = $pdo->prepare("INSERT INTO enquiries (user_id, enquiry) VALUES (?, ?)");
    // $stmt->execute([$userId, $enquiry]);

    echo "Enquiry sent!";
}
?>
