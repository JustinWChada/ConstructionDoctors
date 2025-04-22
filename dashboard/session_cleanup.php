<?php

session_start();

$inactive = 1800; // 30 minutes in seconds

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactive)) {
    // last activity was more than 30 minutes ago
    // unset $_SESSION variable for the run-time 
    $_SESSION = array();

    // destroy session data in storage
    session_destroy();

    // unset cookies
    setcookie(session_name(), '', time() - 3600);

    // Redirect to login page (or appropriate logout page)
    header("Location: ../pages/why_log_out");
    exit();
}

$_SESSION['last_activity'] = time(); // update last activity time stamp

// The rest of your application code goes here...

?>