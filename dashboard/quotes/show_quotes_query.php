<?php
require "../db_management.php";

function deleteQuote($MgtConn, $id)
{
    try {
        $stmt = $MgtConn->prepare("UPDATE
    quotes SET quote_status = 1 WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error deleting quote: " . $e->getMessage());
        return false;
    }
}

// Handle "Delete" action
if (isset($_GET['delete_quote'])) {
    $id_to_delete = $_GET['delete_quote'];
    if (deleteQuote($MgtConn, $id_to_delete)) {
        header("Location: " . $_SERVER['HTTP_REFERER']); //$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Failed to delete quote.</div>";
    }
}