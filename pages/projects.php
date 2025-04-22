<?php
require "../queries/db_management.php";
$pa = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Projects - [Your Electrician Company]</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/projects.css">
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

    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1>Our Recent Projects</h1>
                    <p>See some of our completed work and get inspired.</p>
                </div>
            </div>
        </section>

        <br>

        <!-- Project Section -->
        <section>
            <div class="row g-2">
                <?php
                try {
                    $stmt = $MgtConn->prepare("SELECT * FROM projects");
                    $stmt->execute();
                    $projects = $stmt->get_result();

                    $pa = true;
                    while ($row = $projects->fetch_assoc()) {
                        $project_title = $row['project_title'];
                        $project_description = $row['project_description'];
                        $project_image = $row['project_image'];
                        $project_path = "../files/uploads/projects/$project_image";
                        $created_at = $row['created_at'];
                        ?>
                <div class="col-md-6">
                    <div class="project-card">
                        <div class="project-img-container">
                            <img src="<?php echo htmlspecialchars($project_path) ?>" alt="Project 1">
                        </div>
                        <div class="project-content">
                            <h3><?php echo htmlspecialchars($project_title) ?></h3>
                            <p><?php echo htmlspecialchars($project_description) ?> </p>
                            <small><?php echo htmlspecialchars($created_at) ?></small>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } catch (PDOException $e) {
                    //echo "Error: " . $e->getMessage();
                    $projects = []; // Ensure $projects is an empty array in case of error
                    ?>
                <div class="container">
                    <h2 class="text-center">OOPS! There was an error Displaying our Projects</h2>

                    <!-- Placeholder Message -->
                    <div class="text-center">
                        <p>We are currently working on displaying our project portfolio. Please check back soon for
                            updates!</p>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            </div>
        </section>

        <!-- More -->
        <section class="project-section">
            <div class="container">
                <h2 class="text-center">More of Our Work</h2>

                <!-- Placeholder Message -->
                <div class="text-center">
                    <p>We are currently building our project portfolio. Please check back soon for updates!</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include("../includes/footer.php"); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/b_t_top.js"></script>
</body>

</html>
