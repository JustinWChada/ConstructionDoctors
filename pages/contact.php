<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - [Your Electrician Company]</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/b_t_top.css">
    <style></style>
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
                <h1>Contact Us</h1>
                <p>We're here to help with all your electrical needs.</p>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <h2 class="section-title text-center">Get In Touch</h2>
            <div class="form-wrapper">
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Your Phone:</label>
                        <div class="input-group">
                            <select class="form-select" id="countryCode">
                                <?php include("countries_codes.php") ?>
                                <!-- Add more country codes as needed -->
                            </select>
                            <input type="text" class="form-control" id="phoneNumber"
                                placeholder="Enter your phone number"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="15">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control" id="subject" placeholder="Enter the subject">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="container">
            <h2 class="text-center">Contact Information</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info-box">
                        <i class="bi bi-geo-alt-fill"></i>
                        <h3>Address</h3>
                        <p>123 Main Street, Anytown, USA</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-box">
                        <i class="bi bi-telephone-fill"></i>
                        <h3>Phone</h3>
                        <p>(123) 456-7890</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-box">
                        <i class="bi bi-envelope-fill"></i>
                        <h3>Email</h3>
                        <p>info@example.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/contact.js"></script>
    </script>

    <script>
    document.getElementById('phoneNumber').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    });
    </script>
</body>

</html>