<?php
// C:\xampp\htdocs\Staticwebsite\index.php

// Site constants
define('SITE_PHONE', '+91-62650410829'); // Tumhara number

// Page metadata
$page_title = "Best Digital Marketing Agency in Mumbai | SEO Services India - DigitalBoost";
$page_description = "Leading digital marketing agency in Mumbai offering SEO, social media marketing, PPC, and web development services. Boost your business growth with our expert team. Get free consultation today!";
$page_keywords = "digital marketing agency Mumbai, SEO services India, social media marketing Mumbai, PPC advertising, web development Mumbai, online marketing consultants, best digital marketing company";

// Include header
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title">Grow Your Business with Mumbai's Leading Digital Marketing Agency</h1>
                    <p class="hero-subtitle">We help Indian businesses dominate online with proven SEO, social media marketing, and PPC strategies. Get more leads, sales, and brand visibility with our expert digital marketing services.</p>
                    <div class="hero-buttons">
                        <a href="contact.php" class="btn btn-primary btn-lg me-3">Get Free Consultation</a>
                        <a href="services.php" class="btn btn-outline-light btn-lg">View Our Services</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fas fa-chart-line" style="font-size: 15rem; opacity: 0.1;"></i>
            </div>
        </div>
    </div>
</section>

<!-- About Preview Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="section-title">Why Choose DigitalBoost for Your Digital Marketing Needs?</h2>
                <p class="section-subtitle">We are Mumbai's most trusted digital marketing agency with 5+ years of experience helping Indian businesses succeed online.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;"><i class="fas fa-trophy"></i></div>
                            <div><h5 class="mb-1">500+ Projects</h5><p class="mb-0 text-muted">Successfully completed</p></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;"><i class="fas fa-users"></i></div>
                            <div><h5 class="mb-1">200+ Clients</h5><p class="mb-0 text-muted">Across India</p></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;"><i class="fas fa-chart-line"></i></div>
                            <div><h5 class="mb-1">300% Growth</h5><p class="mb-0 text-muted">Average ROI increase</p></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="service-icon me-3" style="width: 50px; height: 50px; font-size: 1.2rem;"><i class="fas fa-clock"></i></div>
                            <div><h5 class="mb-1">24/7 Support</h5><p class="mb-0 text-muted">Dedicated account manager</p></div>
                        </div>
                    </div>
                </div>
                <a href="about.php" class="btn btn-primary mt-3">Learn More About Us</a>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fas fa-rocket" style="font-size: 12rem; color: var(--primary-color); opacity: 0.1;"></i>
            </div>
        </div>
    </div>
</section>

<!-- Top Services Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Our Top Digital Marketing Services in Mumbai</h2>
            <p class="section-subtitle">Comprehensive digital marketing solutions to help your business grow online and reach more customers across India</p>
        </div>
        <div class="row">
            <!-- Repeat services cards as in your original code -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-card text-center">
                    <div class="service-icon mx-auto"><i class="fas fa-search"></i></div>
                    <h4>SEO Services</h4>
                    <p>Rank higher on Google with our proven SEO strategies. We help Mumbai businesses dominate local search results and attract more organic traffic.</p>
                    <a href="services.php#seo" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            <!-- Add remaining service cards -->
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">What Our Clients Say About Our Digital Marketing Services</h2>
            <p class="section-subtitle">Don't just take our word for it - hear from businesses across Mumbai and India who have grown with our help</p>
        </div>
        <div class="row">
            <!-- Repeat testimonials as in your original code -->
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="section-padding" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); color: white;">
    <div class="container text-center">
        <h2 class="mb-4">Ready to Grow Your Business Online?</h2>
        <p class="lead mb-4">Get a free digital marketing consultation and discover how we can help your business reach new heights. Contact Mumbai's leading digital marketing agency today!</p>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                    <a href="contact.php" class="btn btn-light btn-lg"><i class="fas fa-calendar-alt me-2"></i>Get Free Consultation</a>
                    <a href="tel:<?php echo SITE_PHONE; ?>" class="btn btn-outline-light btn-lg"><i class="fas fa-phone me-2"></i>Call Now: <?php echo SITE_PHONE; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
