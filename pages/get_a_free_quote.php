<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get a Free Quote - [Your Electrician Company]</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/get_a_free_quote.css">
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
                <h1>Get a Free Quote</h1>
                <p>Fill out the form below to receive a free, no-obligation quote for your electrical project.</p>
            </div>
        </div>
    </section>

    <!-- Quote Form Section -->
    <section class="quote-form-section">
        <div class="container">
            <h2 class="text-center">Request a Quote</h2>
            <div class="quote-form">
                <form>
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="form-group">
                        <label for="serviceType">Type of Service</label>
                        <select class="form-control" id="serviceType" required>
                            <option value="">Select Service Type</option>
                            <option value="wiring">Wiring and Rewiring</option>
                            <option value="faultFinding">Fault Finding and Tripping</option>
                            <option value="motorInstallation">Electrical Motor Installation</option>
                            <option value="solarDesign">Solar System Design</option>
                            <option value="homeAutomation">Home Automation</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="projectDescription">Project Description</label>
                        <textarea class="form-control" id="projectDescription" rows="5"
                            placeholder="Describe your project in detail" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </form>
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