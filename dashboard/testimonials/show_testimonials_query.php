<?php

require "../db_management.php";

// Handle approval/unapproval actions
if (isset($_POST['action']) && ($_POST['action'] === 'approve' || $_POST['action'] === 'unapprove') && isset($_POST['testimonial_id'])) {
    $testimonialId = intval($_POST['testimonial_id']); // Sanitize the ID
    $isApproved = ($_POST['action'] === 'approve') ? 1 : 0; // 1 for approved, 0 for unapproved

    $stmt = $MgtConn->prepare("UPDATE testimonials SET is_approved = ? WHERE id = ?");
    if ($stmt === false) {
        throw new Exception("Prepare failed: " . $MgtConn->error);
    }
    $stmt->bind_param("ii", $isApproved, $testimonialId);

    if ($stmt->execute()) {
        // Success!
    } else {
        throw new Exception("Update failed: " . $stmt->error);
    }
    $stmt->close();
    header("Location: " . $_SERVER['HTTP_REFERER']); //$_SERVER['REQUEST_URI']); // Redirect to the same page
}

// Handle saving the reply
if (isset($_POST['action']) && $_POST['action'] === 'save_reply' && isset($_POST['testimonial_id']) && isset($_POST['reply'])) {
    $testimonialId = intval($_POST['testimonial_id']);
    $comment_reply_date = date("Y-m-d H:i:s");
    $reply = mysqli_real_escape_string($MgtConn, $_POST['reply']); // Sanitize the reply - IMPORTANT!

    $stmt = mysqli_prepare($MgtConn, "UPDATE testimonials SET comment_reply =?,comment_reply_date = ? WHERE id = ?");
    if ($stmt === false) {
        throw new Exception("Prepare failed: " . mysqli_error($MgtConn));
    }
    mysqli_stmt_bind_param($stmt, "ssi", $reply, $comment_reply_date, $testimonialId);

    if (mysqli_stmt_execute($stmt)) {
        // Reply saved successfully
        echo "<p style='color: green;'>Reply saved successfully!</p>";  // Optional success message
    } else {
        throw new Exception("Reply save failed: " . mysqli_error($MgtConn));
    }
    mysqli_stmt_close($stmt);
    header("Location: " . $_SERVER['HTTP_REFERER']); //$_SERVER['REQUEST_URI']); // Redirect to the same page
}