<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials - [Your Electrician Company]</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/testimonials.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/b_t_top.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body>
    <a href="#" id="back-to-top" class="visually-hidden"><i class="bi bi-arrow-up-circle-fill"></i></a>
    <header>
        <?php include "../includes/header.php"; ?>
    </header>

    <nav>
        <?php include "../includes/nav.php"; ?>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>What Our Clients Say</h1>
                <p>Read testimonials from our satisfied customers.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="text-center">Customer Reviews</h2>
            <div class="row">
                <?php

                require "../queries/db_management.php";

                try {
                    // Retrieve approved testimonials from the database, including rating
                    $sql = "SELECT name, comment, image, comment_reply, rating FROM testimonials WHERE is_approved = TRUE ORDER BY created_at DESC";
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
                            $rating = intval($row["rating"]);   // Get the rating as an integer
                

                            echo '<div class="col-md-6">';
                            echo '  <div class="testimonial-card">';
                            echo '    <blockquote class="blockquote">';
                            echo '      <p>"' . $comment . '"</p>';
                            echo '      <div class="blockquote-footer">';


                            if ($imagePath) {
                                echo '      <img src="' . $imagePath . '" alt="' . $name . '">';
                            } else {
                                echo '      <img src="../img/default_profile.jpg" alt="' . $name . '">';
                            }


                            echo '        <div class="author-info">';
                            echo '          <span class="author-name">' . $name . '</span>';
                            echo '          <div class="star-rating">';

                            // Output star rating
                            for ($i = 0; $i < $rating; $i++) {
                                echo '            <i class="bi bi-star-fill"></i>';
                            }
                            // Fill in the empty stars if needed
                            for ($i = $rating; $i < 5; $i++) {
                                echo '            <i class="bi bi-star"></i>'; // Assuming you have a `bi-star` class for empty stars
                            }
                            echo '          </div>';
                            echo '        </div>';
                            echo '      </div>';

                            // Display the reply if it exists
                            if (!empty($reply)) {
                                echo '    <div class="testimonial-reply">';
                                echo '      <p><strong>Reply:</strong> ' . nl2br($reply) . '</p>'; // Add Reply with nl2br
                                echo '    </div>';
                            }

                            echo '    </blockquote>';
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
        </div>
    </section>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/b_t_top.js"></script>
</body>

</html>