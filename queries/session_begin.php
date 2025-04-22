<?php
// direct to dashboard.php

session_start(); // Start the session at the beginning

// Check if the user is signed in
if (!isset($_SESSION['user_id'])) {
    // If not signed in, redirect to the sign-in page
    header("Location: ../pages/signin.php");
    exit;
}

// Access user data from the session
$userId = $_SESSION['user_id'];
$firstName = isset($_SESSION['first_name']); // ? $_SESSION['first_name'] : 'user'; // Optional
$email = isset($_SESSION['email']) ? $_SESSION['email'] : ''; // Optional

header("Location:../dashboard/dashboard?n=$firstName");
?>