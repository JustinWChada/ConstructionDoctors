<?php
require "../queries/db_management.php";
$pa = false;
?>

<section class="recent-projects py-5">
    <div class="container">
        <h2 class="section-title text-center fw-bold m-2">Recent Projects</h2>
        <div id="projectsCarousel" class="projects-carousel carousel slide" data-bs-ride="carousel">

            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#projectsCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#projectsCarousel" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#projectsCarousel" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
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
                        $active = "";

                        if ($pa) {
                            $active = "active";
                        }
                        ?>
                <div class="carousel-item <?php echo $active ?> ">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo htmlspecialchars($project_path) ?>" class="d-block w-100"
                                alt="<?php echo htmlspecialchars($project_title) ?>">
                        </div>
                        <div class="col-md-6">
                            <h3 class="recent-project-title"><?php echo htmlspecialchars($project_title) ?></h3>
                            <p><?php echo htmlspecialchars($project_description) ?></p>
                            <small><?php echo htmlspecialchars($created_at) ?></small>
                        </div>
                    </div>
                </div>
                <?php
                        $pa = false;
                    }
                } catch (PDOException $e) {
                    //echo "Error: " . $e->getMessage();
                    $projects = []; // Ensure $projects is an empty array in case of error
                    ?>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="../img/oops.jfif" class="d-block w-100" alt="OOPS! An error occurred">
                        </div>
                        <div class="col-md-6">
                            <h3 class="recent-project-title">OOPS! An Error Occurred During Projects Display</h3>
                            <p>We are currently building our project portfolio. Please check back soon for updates!</p>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
