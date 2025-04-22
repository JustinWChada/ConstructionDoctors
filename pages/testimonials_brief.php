<section class="testimonials py-5">
    <div class="container">
        <h2 class="section-title text-center">What Our Clients Say</h2>
        <div class="row">
            <?php

            try {
                require "../queries/db_management.php";

                // Retrieve approved testimonials from the database
                $sql = "SELECT name, comment, image, comment_reply FROM testimonials WHERE is_approved = TRUE ORDER BY created_at DESC LIMIT 3";
                $result = $MgtConn->query($sql);

                if ($result === false) {
                    throw new Exception("Query failed: " . $MgtConn->error);
                }

                // Output the testimonials
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = htmlspecialchars($row["name"]); // Sanitize for display
                        $comment = htmlspecialchars($row["comment"]); // Sanitize for display
                        $image = htmlspecialchars($row["image"]); // Sanitize for display (if any)
                        $imagePath = htmlspecialchars("../files/uploads/testimonials/$image");
                        $reply = htmlspecialchars($row["comment_reply"]);   // Sanitize the reply (if any)
            
                        echo '<div class="col-md-4">';
                        echo '  <div class="testimonial-box">';
                        echo '    <p>"' . $comment . '"</p>';
                        echo '    <div class="testimonial-author">';

                        if ($imagePath) {
                            echo '    <img src="' . $imagePath . '" alt="' . $name . '" class="rounded-circle">';
                        } else {
                            echo '    <img src="../img/default_profile.jpg" alt="' . $name . '" class="rounded-circle">';
                        }

                        echo '      <span>' . $name . '</span>';
                        echo '    </div>';

                        // Display the reply if it exists
                        if (!empty($reply)) {
                            echo '    <div class="testimonial-reply mt-1">';
                            echo '      <p><strong>Reply:</strong> ' . nl2br($reply) . '</p>'; // Add Reply with nl2br
                            echo '    </div>';
                        }

                        echo '  </div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p class='fw-2 text-center'>Hi there! We are still building our client base. Check Back soon !.</p>"; // Or display a placeholder message
                }

                $MgtConn->close();

            } catch (Exception $e) {
                echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>
        <a href="testimonials" class="btn btn-outline-warning px-2 mt-2 active">View More Testimonials</a>
    </div>
</section>