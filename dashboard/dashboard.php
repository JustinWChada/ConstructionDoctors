<?php
//accessing data
// Access user data from the session
include "session_cleanup.php";
//session_start();

$userId = $_SESSION['user_id'] or header("location: ../pages/signin");
$firstName = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'User'; // Optional
$email = isset($_SESSION['email']) ? $_SESSION['email'] : ''; // Optional

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConstructionDoctors - <?php echo $firstName ?></title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style></style>
</head>

<body onload="$('#spinner').hide();">
    <!-- Spinner Start
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
        hidden>
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span>CDoc</span>
        </div>
    </div>-->


    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 sidebar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="nav" id="sidebarNav">
                        <li class="nav-item" onclick="displayProfile('<?= $userId ?>')">
                            <a class="nav-link active" href="?profile">
                                <i class="bi bi-person-circle"></i>
                                <?php echo $firstName ?>
                            </a>
                        </li>

                        <li class="nav-item" onclick="displayStatistic()">
                            <a class="nav-link" href="?statistics">
                                <i class="bi bi-speedometer"></i>
                                Statistics
                            </a>
                        </li>
                        <li class="nav-item" onclick="displayMessages()">
                            <a class="nav-link" href="?messages">
                                <i class="bi bi-chat-dots-fill"></i>
                                Messages
                            </a>
                        </li>
                        <li class="nav-item" onclick="displayQuotes()">
                            <a class="nav-link" href="?quotes">
                                <i class="bi bi-cash-coin"></i>
                                Quotes
                            </a>
                        </li>
                        <li class="nav-item" onclick="displayTestimonials()">
                            <a class="nav-link" href="?testimonials">
                                <i class="bi bi-calendar-check-fill"></i>
                                Testimonials
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?faqs" data-bs-toggle="collapse" data-bs-target="#faqsSubmenu"
                                aria-expanded="false">
                                <i class="bi bi-question-circle-fill"></i>
                                FAQs
                            </a>
                            <ul class="collapse" id="faqsSubmenu">
                                <li class="nav-item" onclick="displayFAQs()">
                                    <a class="nav-link" href="?faqs">Show Faqs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?faqs">Add FAQs</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?projects" data-bs-toggle="collapse"
                                data-bs-target="#projectsSubmenu" aria-expanded="false">
                                <i class="bi bi-tools"></i>
                                Projects
                            </a>
                            <ul class="collapse" id="projectsSubmenu">
                                <li class="nav-item" onclick="displayProjects()">
                                    <a class="nav-link" href="?projects">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?add_projects" onclick="addProjects()">Add
                                        Projects</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" hidden>
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear-fill"></i>
                                Settings
                            </a>
                        </li>
                        <li class="nav-item" disabled="true">
                            <a class="nav-link" href="#">
                                <i class="bi bi-time"></i>
                                <div id="dashboardTime" class="text-center fw-bold text-warning"></div>
                            </a>
                        </li>
                        <li class="nav-item bg-danger text-light text-center">
                            <a class="nav-link" href="?signout">
                                <i class="bi bi-box-arrow-left"></i>
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>




            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 p-0" id="dashboardPlane">

            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>