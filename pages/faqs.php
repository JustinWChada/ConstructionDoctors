<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - [Your Electrician Company]</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/faqs.css">
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Frequently Asked Questions</h1>
                <p>Find answers to common questions about our electrical services.</p>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2 class="text-center">Common Questions</h2>

            <div class="accordion" id="faqAccordion">
                <?php
                require "../queries/db_management.php";
                function displayFaqs($MgtConn)
                {
                    try {
                        $sql = "SELECT faq_id, question, answer FROM faqs ORDER BY created_at DESC";
                        $stmt = $MgtConn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        //if ($stmt->row_count > 0) {
                        echo '<div class="accordion" id="faqAccordion">';
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                            $faq_id = htmlspecialchars($row["faq_id"]);
                            $question = htmlspecialchars($row["question"]);
                            $answer = htmlspecialchars($row["answer"]);
                            $collapseId = 'collapse' . $i;
                            $headingId = 'heading' . $i;
                            $expanded = ($i === 1) ? 'true' : 'false'; // First item is expanded by default
                            $showClass = ($i === 1) ? 'show' : ''; // First item is shown by default
                
                            echo '<div class="accordion-item">';
                            echo '  <h2 class="accordion-header" id="' . $headingId . '">';
                            echo '      <button class="accordion-button" type="button" data-bs-toggle="collapse"';
                            echo '          data-bs-target="#' . $collapseId . '" aria-expanded="' . $expanded . '" aria-controls="' . $collapseId . '">';
                            echo $question;
                            echo '      </button>';
                            echo '  </h2>';
                            echo '  <div id="' . $collapseId . '" class="accordion-collapse collapse ' . $showClass . '" aria-labelledby="' . $headingId . '"';
                            echo '      data-bs-parent="#faqAccordion">';
                            echo '      <div class="accordion-body">';
                            echo $answer;
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';

                            $i++;
                        }
                        echo '</div>';
                        /*} else {
                            echo "<p>No FAQs found.</p>";
                        }*/

                    } catch (PDOException $e) {
                        echo "<p style='color:red;'>Connection error: " . $e->getMessage() . "</p>";
                    }
                }

                displayFaqs($MgtConn);
                ?>
                <!-- FAQ Item n+1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            What types of electrical services do you offer?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We offer a wide range of electrical services, including wiring and rewiring, fault finding,
                            electrical motor installation, solar system design, Wi-Fi control setup, and more for
                            domestic, commercial, and industrial sectors.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item n+2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Are you licensed and insured?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, we are fully licensed and insured to provide electrical services in [Your Service
                            Area]. Our licensing ensures that we meet the highest standards of safety and
                            professionalism.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item n+3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What are your service areas?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We provide electrical services throughout [Your Service Area], including [City 1], [City 2],
                            and [City 3]. Contact us to confirm if we serve your specific location.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item n+4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Do you offer emergency electrical services?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes, we offer 24/7 emergency electrical services. Contact us at [Your Emergency Contact
                            Number] for immediate assistance.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item n+5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            How can I request a quote for my electrical project?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can request a quote by filling out the contact form on our website, or by calling us
                            directly at [Your Phone Number]. We will assess your needs and provide a detailed estimate.
                        </div>
                    </div>
                </div>
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