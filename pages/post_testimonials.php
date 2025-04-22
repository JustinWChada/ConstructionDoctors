<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Testimonials(Review) - [Your Electrician Company]</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/post_testimonials.css">
    <link rel="stylesheet" href="../css/b_t_top.css">
    <link rel="stylesheet" href="../css/footer.css">
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

    <section id="review-form" class="review-form">
        <h2>Share Your Experience </h2>

        <form id="testimonialForm">
            <label for="name">Your Name *:</label>
            <input type="text" id="name" name="name" required>

            <label for="rating">Rating (1-5) *:</label>
            <div class="form-group my-2">
                <i class="bi bi-star-fill fs-3 text-warning" id="star1"></i>
                <i class="bi bi-star-fill fs-3 text-warning" id="star2"></i>
                <i class="bi bi-star-fill fs-3 text-warning" id="star3"></i>
                <i class="bi bi-star-fill fs-3" id="star4"></i>
                <i class="bi bi-star-fill fs-3" id="star4"></i>
                <input type="text" name="rating" id="starsCount" required hidden readonly value="3">
            </div>

            <label for="comment">Your Review/Testimony *:</label>
            <textarea id="comment" name="comment" rows="4" required></textarea>

            <label for="image">Image (of you or Any Picture from our Recent Service at your location) *:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <br><br>

            <input type="checkbox" required>
            <small>By checking I give consent to Construction Doctors to remove my testimony if it violates any of the
                policies and/or if it is any way false or pointing to a false service or event.
                <b>Note: Construction Doctors has the right to remove any testimonies that are false</b></small>
            <br>
            <button type="submit" class="mt-1">Submit Review</button>
            <div id="response"></div>

            <div class="card-footer w-100 my-2 text-center">
                <button class="btn btn-sm btn-outline-primary m-2 active">Share Form</button>
                <button class="btn btn-sm btn-outline-primary m-2 active">View Testimonials</button>
            </div>
        </form>
    </section>

    <?php include "../includes/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="../js/post_testimonials.js"></script>
    <script src="../js/b_t_top.js"></script>
</body>

</html>