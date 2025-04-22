<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - [Your Electrician Company]</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/signin.css">
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
                <h1>Sign In</h1>
                <p>Welcome back! Please sign in to continue.</p>
            </div>
        </div>
    </section>

    <!-- Auth Form Section -->
    <section class="auth-form-section">
        <div class="container">
            <div class="auth-form">
                <h2 class="text-center">Sign In</h2>
                <form id="signin-form">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password"
                            required>
                    </div>
                    <button type="submit" class="signin-btn btn btn-primary">Sign In</button>
                </form>
                <p>Don't have an account? <a href="signup">Sign Up</a></p>
                <p>Forgot Password? <a href="forgotten_password">Click Here</a></p>
            </div>
        </div>
    </section>

    <footer>
        <?php include "../includes/footer.php"; ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="../js/b_t_top.js"></script>
    <script src="../js/signin.js"></script>
</body>

</html>