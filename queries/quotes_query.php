<?php
// Database connection details (replace with your actual credentials)
require "db_management.php";

// Function to store the email in the database
function storeQuoteEmail($MgtConn, $email)
{
    // Validate the email address (basic check)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";  // Or throw an exception
    }

    $created_at = date("Y-m-d H:i:s");


    try {
        $stmt = $MgtConn->prepare("INSERT INTO quotes (quote_email,created_at) VALUES (?,?)");
        $stmt->bind_param('ss', $email, $created_at);
        $stmt->execute();
        return "Email submitted successfully!";
    } catch (PDOException $e) {
        error_log("Error storing email: " . $e->getMessage());
        return "An error occurred while submitting your email. Please try again later.";
    }
}

// Handle form submission
if (isset($_POST['quote_email'])) {
    $email = $_POST['quote_email'];
    $message = storeQuoteEmail($MgtConn, $email); // Store the email and get a status message
    echo "<div class='alert alert-info'>" . htmlspecialchars($message) . "</div>"; //Display alert message
} else {
    echo "<div class='alert alert-danger'>Email field is required.</div>";
}