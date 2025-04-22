<?php
require "../db_management.php";

try {

    // Retrieve testimonials from the database
    $sql = "SELECT * FROM testimonials ORDER BY created_at DESC";  // Order by date
    $result = $MgtConn->query($sql);

    if ($result === false) {
        throw new Exception("Query failed: " . $MgtConn->error);
    }
} catch (Exception $e) {
    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    $result = null; // Prevent errors later
}
?>

<link rel="stylesheet" href="testimonials/show_testimonials.css" type="text/css">

<h1>Admin - Testimonial Management</h1>

<div id="testimonials-container">
    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $testimonialId = $row["id"];
            $name = htmlspecialchars($row["name"]); // Escape for display
            $rating = intval($row["rating"]);
            $comment = htmlspecialchars($row["comment"]);
            $comment_reply = htmlspecialchars($row["comment_reply"]);
            $image = htmlspecialchars($row["image"]); // Escape for display
            $imagePath = htmlspecialchars("../files/uploads/testimonials/$image");
            $isApproved = (bool) $row["is_approved"]; // Cast to boolean
            $submissionDate = $row["created_at"];

            echo "<div class='testimonial-block'>";

            if ($imagePath) {
                echo "<img src='" . htmlspecialchars($imagePath) . "' alt='Testimonial Image' class='testimonial-image'>"; //Escape
            }

            echo "<p><strong>Name:</strong> " . $name . "</p>";
            echo "<p><strong>Rating:</strong> " . $rating . "/5</p>";
            echo "<p><strong>Comment:</strong> " . nl2br($comment) . "</p>"; // nl2br for line breaks
            echo "<p><strong>Submitted:</strong> " . $submissionDate . "</p>";

            // Approval form
            echo "<form method='post' action='testimonials/show_testimonials_query.php' enctype='multipart/form-data'>";
            echo "<input type='hidden' name='testimonial_id' value='" . $testimonialId . "'>";

            if ($isApproved) {
                echo "<input type='hidden' name='action' value='unapprove'>";
                echo "<button type='submit' class='unapprove-button'>Unapprove</button>";
            } else {
                echo "<input type='hidden' name='action' value='approve'>";
                echo "<button type='submit' class='approve-button'>Approve</button>";
            }

            echo "</form>";
            echo "<button class='reply-button' data-testimonial-id='" . $testimonialId . "'>Reply</button>";

            echo "</div>"; // Close testimonial-block
    
            // Modal Structure (This needs to be inside the loop to create a modal for each testimonial)
            echo '<div id="replyModal-' . $testimonialId . '" class="modal">';
            echo '  <div class="modal-content">';
            echo '    <span class="close" onclick="closeModal(' . $testimonialId . ')">×</span>';
            echo '    <h2>Reply to Testimonial</h2>';
            echo '    <form method="post" action="testimonials/show_testimonials_query.php" enctype="multipart/form-data">';
            echo '      <input type="hidden" name="action" value="save_reply">';
            echo '      <input type="hidden" name="testimonial_id" value="' . $testimonialId . '">';
            echo '      <textarea name="reply" rows="5">' . $comment_reply . '</textarea><br>'; // Display existing reply
            echo '      <button type="submit">Save Reply</button>';
            echo '    </form>';
            echo '  </div>';
            echo '</div>';
        }
        $MgtConn->close();
    } else {
        echo "<p>No testimonials found.</p>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="testimonials/show_testimonials.js"></script>