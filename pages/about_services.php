<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - [Your Electrician Company]</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/about_services.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/b_t_top.css">
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
    <main>
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1>Our Services</h1>
                    <p>Your one-stop solution for all your electrical needs.</p>
                    <a href="contact" class="btn btn-primary">Request a Quote</a>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services-section">
            <div class="container">
                <h2 class="text-center">What We Offer</h2>
                <div class="row g-4">
                    <!-- Core Services -->
                    <div class="col-md-6">
                        <div class="service-card">
                            <i class="bi bi-lightning-fill"></i>
                            <h3>Wiring and Rewiring</h3>
                            <p>Expert wiring and rewiring services for homes, businesses, and industrial facilities.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service-card">
                            <i class="bi bi-search"></i>
                            <h3>Fault Finding and Tripping</h3>
                            <p>Professional fault finding and tripping solutions to ensure the safety of your electrical
                                systems.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service-card">
                            <i class="bi bi-gear-fill"></i>
                            <h3>Electrical Motors and Programming Logic Unit</h3>
                            <p>Installation, maintenance, and repair of electrical motors and programming logic units.
                            </p>
                        </div>
                    </div>

                    <!-- Renewable Energy Services -->
                    <div class="col-md-6">
                        <div class="service-card">
                            <i class="bi bi-sun-fill"></i>
                            <h3>Solar System Installation and Design</h3>
                            <p>Design and installation of efficient solar energy systems tailored to your needs.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service-card">
                            <i class="bi bi-code-slash"></i>
                            <h3>System Programming and Loading Testing</h3>
                            <p>Programming and loading testing of electrical systems to ensure optimal performance.</p>
                        </div>
                    </div>

                    <!-- Smart Home Solutions -->
                    <div class="col-md-6">
                        <div class="service-card">
                            <i class="bi bi-wifi"></i>
                            <h3>Wi-Fi Control and Home Automation</h3>
                            <p>Integration of Wi-Fi control and home automation systems for convenience and energy
                                efficiency.</p>
                        </div>
                    </div>

                    <!-- Power Solutions -->
                    <div class="col-md-6">
                        <div class="service-card">
                            <i class="bi bi-house-fill"></i>
                            <h3>Off-Grid System and Backup Solutions</h3>
                            <p>Off-grid system design and backup solutions to keep your power running even during
                                outages.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service-card">
                            <i class="bi bi-power"></i>
                            <h3>Generators</h3>
                            <p>Installation and maintenance of generators for reliable backup power.</p>
                        </div>
                    </div>

                    <!-- Lighting and Aesthetics -->
                    <div class="col-md-6">
                        <div class="service-card">
                            <i class="bi bi-lamp-fill"></i>
                            <h3>Exclusive Lighting</h3>
                            <p>Design and installation of exclusive lighting solutions to enhance your space.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sectors Section -->
        <section class="sectors-section">
            <div class="container">
                <h2 class="text-center">Sectors We Serve</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="sector-card">
                            <i class="bi bi-house-door-fill"></i>
                            <h3>Domestic</h3>
                            <p>Comprehensive electrical services for residential properties, ensuring safety and
                                efficiency.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sector-card">
                            <i class="bi bi-shop"></i>
                            <h3>Commercial</h3>
                            <p>Tailored electrical solutions for businesses of all sizes, from offices to retail spaces.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sector-card">
                            <i class="bi bi-buildings"></i>
                            <h3>Industrial</h3>
                            <p>Specialized electrical services for industrial facilities, ensuring reliability and
                                compliance
                                with industry standards.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/b_t_top.js"></script>
</body>

</html>