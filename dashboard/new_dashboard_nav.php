<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="?profile" data-bs-toggle="collapse" data-bs-target="#profileSubmenu" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                    <?php echo $firstName ?>
                </a>
                <ul class="collapse" id="profileSubmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 2</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?statistics" data-bs-toggle="collapse" data-bs-target="#statisticsSubmenu" aria-expanded="false">
                    <i class="bi bi-speedometer"></i>
                    Statistics
                </a>
                <ul class="collapse" id="statisticsSubmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 2</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?messages" data-bs-toggle="collapse" data-bs-target="#messagesSubmenu" aria-expanded="false">
                    <i class="bi bi-chat-dots-fill"></i>
                    Messages
                </a>
                <ul class="collapse" id="messagesSubmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 2</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?quotes" data-bs-toggle="collapse" data-bs-target="#quotesSubmenu" aria-expanded="false">
                    <i class="bi bi-cash-coin"></i>
                    Quotes
                </a>
                <ul class="collapse" id="quotesSubmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 2</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?testimonials" data-bs-toggle="collapse" data-bs-target="#testimonialsSubmenu" aria-expanded="false">
                    <i class="bi bi-calendar-check-fill"></i>
                    Testimonials
                </a>
                <ul class="collapse" id="testimonialsSubmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 2</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?faqs" data-bs-toggle="collapse" data-bs-target="#faqsSubmenu" aria-expanded="false">
                    <i class="bi bi-question-circle-fill"></i>
                    FAQs
                </a>
                <ul class="collapse" id="faqsSubmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 2</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?projects" data-bs-toggle="collapse" data-bs-target="#projectsSubmenu" aria-expanded="false">
                    <i class="bi bi-tools"></i>
                    Projects
                </a>
                <ul class="collapse" id="projectsSubmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Submenu 2</a>
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
