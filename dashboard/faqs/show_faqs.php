<?php
require "../db_management.php";
// --- ADD FAQ ---
function addFaq($MgtConn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_faq'])) {
        try {
            $sql = "INSERT INTO faqs (created_at) VALUES (NOW())";
            $stmt = $MgtConn->prepare($sql);

            if ($stmt->execute()) {
                echo "<p style='color:green;'>FAQ added successfully.</p>";
            } else {
                echo "<p style='color:red;'>Error adding FAQ: " . $stmt->errorInfo()[2] . "</p>";
            }

        } catch (PDOException $e) {
            echo "<p style='color:red;'>Connection error: " . $e->getMessage() . "</p>";
        }
    }
    ?>
    <form method="post">
        <button type="submit" name="add_faq">Add FAQ</button>
    </form>
    <?php
}



// --- RETRIEVE FAQs ---
function getFaqs($MgtConn)
{
    try {
        $sql = "SELECT faq_id, created_at FROM faqs ORDER BY created_at DESC";
        $stmt = $MgtConn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<table>";
            echo "<thead><tr><th>FAQ ID</th><th>Created At</th><th>Actions</th></tr></thead>";
            echo "<tbody>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["faq_id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
                echo "<td><a href='?delete_faq=" . htmlspecialchars($row["faq_id"]) . "'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No FAQs found.</p>";
        }

    } catch (PDOException $e) {
        echo "<p style='color:red;'>Connection error: " . $e->getMessage() . "</p>";
    }
}



// --- DELETE FAQ ---
function deleteFaq($MgtConn)
{
    if (isset($_GET['delete_faq']) && is_numeric($_GET['delete_faq'])) {
        $faq_id = intval($_GET['delete_faq']);

        try {
            $sql = "DELETE FROM faqs WHERE faq_id = :faq_id";
            $stmt = $MgtConn->prepare($sql);
            $stmt->bindParam(':faq_id', $faq_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo "<p style='color:green;'>FAQ deleted successfully.</p>";
                // Optionally redirect to refresh the FAQ list.
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();

            } else {
                echo "<p style='color:red;'>Error deleting FAQ: " . $stmt->errorInfo()[2] . "</p>";
            }

        } catch (PDOException $e) {
            echo "<p style='color:red;'>Connection error: " . $e->getMessage() . "</p>";
        }
    }
}


// Example Usage (assuming $MgtConn is already defined and connected)
// Remember to include your database connection code before using these functions

//addFaq($MgtConn); // Display the Add FAQ form
//deleteFaq($MgtConn); // Handle delete FAQ request based on GET parameter
//getFaqs($MgtConn); // Display the FAQ list
?>