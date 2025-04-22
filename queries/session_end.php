<?php
// logout.php

session_start(); // Start the session

// Unset all session variables.  This is the CORRECT way to clear the session.
$_SESSION = array(); // Clears the $_SESSION array. An alternative (if you only need to clear a few values) is to use unset($_SESSION['variable'])

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

// Redirect to the sign-in page
header("Location: ../pages/signin");
exit;
?>