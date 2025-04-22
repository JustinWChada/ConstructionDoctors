<?php
require "../db_management.php";

// Function to mark message as "done" (set contact_status to 1)
function markAsDone($MgtConn, $id)
{
    try {
        $stmt = $MgtConn->prepare("UPDATE contact_messages SET contact_status = 1 WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return true; // Success
    } catch (PDOException $e) {
        error_log("Error marking as done: " . $e->getMessage()); // Log the error
        return false; // Failure
    }
}

// Handle "Mark as Done" action
if (isset($_GET['mark_done'])) {
    $id_to_mark = $_GET['mark_done'];
    if (markAsDone($MgtConn, $id_to_mark)) {
        header("Location: " . $_SERVER['HTTP_REFERER']); // Refresh the page . $_SERVER['PHP_SELF']
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Failed to mark message as done. Please check the logs.</div>"; // Display error to user
    }
}

?>