<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Acameny</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.pexels.com/photos/8853536/pexels-photo-8853536.jpeg?auto=compress&cs=tinysrgb&w=600');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0;
        text-align: left;

    }

    .hero-text {
        padding-left: 50px;
    }

    .how-it-works {
        padding: 50px 0;
        text-align: center;
    }

    .how-it-works-cards {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 30px;
    }

    .card {
        width: 200px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
    }

    .card i {
        font-size: 40px;
        margin-bottom: 10px;
        color: #007bff;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    TUTOR ACAMENY
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hero-text">
                    <h1>FIND THE RIGHT TUTOR IN YOUR AREA</h1>
                    <h2>LEARN MORE SKILLS, BE MORE COMPETITIVE</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <button class="btn btn-primary">Read More</button>
                </div>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <div class="container">
            <h2>HOW IT WORK FOR TUTORS</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <div class="how-it-works-cards">
                <div class="card">
                    <i class="bi bi-mortarboard-fill"></i>
                    <h4>COLLEGE TUTOR</h4>
                </div>
                <div class="card">
                    <i class="bi bi-calendar-date"></i>
                    <h4>SET SCHEDULE</h4>
                </div>
                <div class="card">
                    <i class="bi bi-mortarboard"></i>
                    <h4>APPLYING TUITION</h4>
                </div>
                <div class="card">
                    <i class="bi bi-person-circle"></i>
                    <h4>START JOURNEY</h4>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>