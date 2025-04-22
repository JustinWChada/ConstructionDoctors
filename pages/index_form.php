<section class="contact-prompt py-5" style="display: none;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <img src="https://images.unsplash.com/photo-1560250097-0644ea1ca2af?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Person Raising Hand" class="img-fluid raising-hand-image">
            </div>
            <div class="col-md-6 text-center">
                <h2>Need an Electrical Expert?</h2>
                <p>We're here to help with all your electrical needs. Get in touch for reliable, professional service.
                </p>
                <a href="/contact" class="cta-button">
                    <span class="text">Contact Us Today</span>
                    <span class="icon"><i class="bi bi-arrow-right-circle-fill"></i></span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="contact-form-section">
    <div class="container">
        <h2 class="section-title text-center">Get In Touch</h2>
        <div class="form-wrapper">
            <form id="contactForm">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Your Phone:</label>
                    <div class="input-group">
                        <select class="form-select" id="countryCode">
                            <?php include("countries_codes.php") ?>
                            <!-- Add more country codes as needed -->
                        </select>
                        <input type="text" class="form-control" id="phoneNumber" placeholder="Enter your phone number"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="15">
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" placeholder="Enter the subject">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"
                        required></textarea>
                </div>
                <button type="submit" class="btn btn-warning">Send Message</button>
            </form>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../js/contact.js"></script>
<script>
document.getElementById('phoneNumber').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
});
</script>