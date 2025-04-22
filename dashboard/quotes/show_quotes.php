<?php // Database connection details (replace with your actual credentials) 
require "../db_management.php";
// Function to "delete" a quote (set status to 0) 
// function deleteQuote($MgtConn, $id)
// {
//     try {
//         $stmt = $MgtConn->prepare("UPDATE
//     quotes SET quote_status = 1 WHERE id = ?");
//         $stmt->bind_param('i', $id);
//         $stmt->execute();
//         return true;
//     } catch (PDOException $e) {
//         error_log("Error deleting quote: " . $e->getMessage());
//         return false;
//     }
// }

// // Handle "Delete" action
// if (isset($_GET['delete_quote'])) {
//     $id_to_delete = $_GET['delete_quote'];
//     if (deleteQuote($MgtConn, $id_to_delete)) {
//         header("Location: " . $_SERVER['PHP_SELF']);
//         exit();
//     } else {
//         echo "<div class='alert alert-danger' role='alert'>Failed to delete quote.</div>";
//     }
// }

// Retrieve quotes with status = 1
try {
    $stmt = $MgtConn->prepare("SELECT * FROM quotes WHERE quote_status = 0 ORDER BY created_at DESC");
    $stmt->execute();
    $quotes = $stmt->get_result();
} catch (PDOException $e) {
    echo "Error retrieving quotes: " . $e->getMessage();
    $quotes = [];
}
?>

<link rel="stylesheet" href="quotes/show_quotes.css" type="text/css">

<div class="container-fluid">
    <h1 class="quote-section-title">Admin - UnProcessed Quotes</h1>

    <?php if (empty($quotes)): ?>
        <div class="alert alert-info" role="alert">No unprocessed quotes found.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <span id="messageElement" class="text-center"></span>
                </tbody>
                <?php foreach ($quotes as $quote): ?>
                    <tr>
                        <td><?= htmlspecialchars($quote['id']) ?></td>
                        <td><a href="mailto:<?= htmlspecialchars($quote['quote_email']) ?>" target="_blank" id="quoteEmail">
                                <?= htmlspecialchars($quote['quote_email']) ?></a></td>
                        <td><?= htmlspecialchars($quote['created_at']) ?></td>
                        <td>
                            <a href="quotes/show_quotes_query?delete_quote=<?= $quote['id'] ?>&quotes"
                                class="btn btn-sm btn-outline-danger delete-button"
                                onclick="return confirm('Are you sure you want to move this quote back to pending?')"
                                title="Move to Pending"><i class="fas fa-trash-alt"></i> Clear</a>
                            <a href="#" class="btn btn-sm btn-outline-warning active"
                                onclick="copyToClipboard('<?= htmlspecialchars($quote['quote_email']) ?>')" id="copyEmail">Copy
                                Email</a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="quotes/show_quotes.js"></script>