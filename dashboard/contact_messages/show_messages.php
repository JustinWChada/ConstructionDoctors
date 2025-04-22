<?php
require "../db_management.php";

// // Function to mark message as "done" (set contact_status to 1)
// function markAsDone($MgtConn, $id)
// {
//     try {
//         $stmt = $MgtConn->prepare("UPDATE contact_messages SET contact_status = 1 WHERE id = ?");
//         $stmt->bind_param('i', $id);
//         $stmt->execute();
//         return true; // Success
//     } catch (PDOException $e) {
//         error_log("Error marking as done: " . $e->getMessage()); // Log the error
//         return false; // Failure
//     }
// }

// // Handle "Mark as Done" action
// if (isset($_GET['mark_done'])) {
//     $id_to_mark = $_GET['mark_done'];
//     echo $id_to_mark;
//     if (markAsDone($MgtConn, $id_to_mark)) {
//         header("Location: " . $_SERVER['PHP_SELF']); // Refresh the page
//         exit();
//     } else {
//         echo "<div class='alert alert-danger' role='alert'>Failed to mark message as done. Please check the logs.</div>"; // Display error to user
//     }
// }

// Retrieve messages with contact_status = 0
try {
    $stmt = $MgtConn->prepare("SELECT * FROM contact_messages WHERE contact_status = 0 ORDER BY created_at DESC"); //Order by created date for newest requests.
    $stmt->execute();
    $messages = $stmt->get_result();
} catch (PDOException $e) {
    echo "Error retrieving messages: " . $e->getMessage();
    $messages = []; // Ensure $messages is an empty array to avoid errors later
}
?>

<link rel="stylesheet" href="contact_messages/show_messages.css" type="text/css" ?>

<div class="container">
    <h1 class="contact-message-title">Contact Messages</h1>
    <?php if (empty($messages)): ?>
    <div class="alert alert-info" role="alert">No new contact messages.</div>
    <?php else: ?>
    <?php foreach ($messages as $message):
            $phone = $message['contact_country_code'] . $message['contact_phone_number'];
            ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($message['name']) ?></h5>
            <p class="card-text"><strong>Subject:</strong> <?= htmlspecialchars($message['contact_subject']) ?></p>
            <p class="card-text"><strong>Message:</strong> <?= htmlspecialchars($message['contact_message']) ?></p>
            <p class="card-text"><strong>Received:</strong> <?= htmlspecialchars($message['created_at']) ?></p>

            <!-- Contact Icons -->
            <?php if ($message['contact_email']): ?>
            <a href="mailto:<?= htmlspecialchars($message['contact_email']) ?>" class="icon-link" title="Email"><i
                    class="fas fa-envelope"></i></a>
            <?php endif; ?>

            <?php if ($message['contact_phone_number']): ?>
            <a href="tel:<?= $phone ?>" target="_blank" class="btn btn-sm btn-outline-dark" title="Call"><i
                    class="bi bi-phone"></i></a>
            <a href="https://wa.me/<?= substr($phone, 1) ?>" class="btn btn-sm btn-outline-success" target="_blank"
                title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
            <?php endif; ?>

            <!-- Mark as Done Button -->
            <a href="contact_messages/show_messages_query?messages&mark_done=<?= $message['id'] ?>"
                class="btn btn-sm btn-outline-danger mark-done-button"
                onclick="return confirm('Mark this message as done?')" title="Mark as Done"><i class="bi bi-trash"></i>
                Remove</a>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>