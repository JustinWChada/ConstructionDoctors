<div class="hero-wrapper">
    <header class="hero-nav">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    ELECTRICAL SERVICES
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
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="hero">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-6">
                    <div class="hero-text-container">
                        <h1>Your Trusted Electrical Experts</h1>
                        <p>From wiring upgrades to complex installations, we're your trusted electrical experts. We
                            provide comprehensive solutions for all your residential and commercial electrical needs.
                        </p>
                        <a href="#" class="btn btn-warning">Get a Free Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
/* Hero Wrapper */
.hero-wrapper {
    position: relative;
    /* Make this the positioning context */
    height: 100vh;
    /* Full viewport height */
    width: 100%;
    overflow: hidden;
    /* Prevent scrollbars if content exceeds viewport */
}

/* Navigation Styles - positioned relative to hero wrapper */
.hero-nav {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 10;
    /* Ensure it's above the hero image */
    background: rgba(0, 0, 0, 0.5);
    /* Optional: add a semi-transparent background to the nav */
}

/* Existing Navigation Styles (adjust as needed) */
.navbar {
    background-color: transparent !important;
    /* Make the navbar transparent */
    padding: 15px 0;
}

.navbar-brand {
    font-weight: bold;
    color: #ffc107 !important;
    font-size: 1.5rem;
}

.navbar-brand:hover {
    color: #fff !important;
}

.navbar-toggler {
    border-color: #ffc107;
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(255, 193, 7, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

.navbar-nav .nav-link {
    color: #fff !important;
    margin-left: 15px;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
    color: #ffc107 !important;
}

/* Hero Section Styles */
.hero {
    background-image: url('https://images.pexels.com/photos/2898199/pexels-photo-2898199.jpeg?auto=compress&cs=tinysrgb&w=600');
    background-size: cover;
    background-position: center;
    height: 100vh;
    /* Full viewport height */
    position: relative;
    color: #fff;
}

.hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.hero .container-fluid,
.hero .row {
    position: relative;
    z-index: 1;
}

.hero-text-container {
    background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(77, 65, 0, 0.6));
    padding: 30px;
    border-radius: 10px;
    color: #fff;
}

.hero-text-container h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #ffc107;
}

.hero-text-container p {
    font-size: 1.1rem;
    line-height: 1.6;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #212529;
}

.btn-warning:hover {
    background-color: #ffca2c;
    border-color: #ffc107;
    color: #212529;
}
</style>