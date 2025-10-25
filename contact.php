<?php
// Contact Page - Digital Marketing Agency
$page_title = "Contact DigitalBoost - Get Free Digital Marketing Consultation | Mumbai";
$page_description = "Contact Mumbai's leading digital marketing agency for free consultation. Get quotes for SEO, social media marketing, PPC, and web design services. Call +91 98765 43210 today!";
$page_keywords = "contact digital marketing agency Mumbai, free consultation, SEO quote Mumbai, social media marketing consultation, PPC advertising quote, web design Mumbai";

include 'includes/header.php';

// Get service from URL parameter if available
$selected_service = isset($_GET['service']) ? sanitize_input($_GET['service']) : '';
?>

<!-- Page Header -->
<section class="hero-section" style="padding: 120px 0 80px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">Contact Us</h1>
                <p class="hero-subtitle">Ready to grow your business online? Get a free consultation from Mumbai's leading digital marketing experts</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="service-card">
                    <div class="text-center mb-4">
                        <h2>Get Your Free Digital Marketing Consultation</h2>
                        <p class="text-muted">Fill out the form below and our experts will contact you within 24 hours with a customized strategy for your business.</p>
                    </div>
                    
                    <form id="inquiryForm" method="POST" action="pages/submit_inquiry.php">
                        <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="mobile" class="form-label">Mobile Number *</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="10-digit mobile number" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="service" class="form-label">Service Interested In *</label>
                                <select class="form-control" id="service" name="service" required>
                                    <option value="">Select a service</option>
                                    <option value="SEO Services" <?php echo ($selected_service == 'SEO Services') ? 'selected' : ''; ?>>SEO Services</option>
                                    <option value="Social Media Marketing" <?php echo ($selected_service == 'Social Media Marketing') ? 'selected' : ''; ?>>Social Media Marketing</option>
                                    <option value="PPC Advertising" <?php echo ($selected_service == 'PPC Advertising') ? 'selected' : ''; ?>>PPC Advertising</option>
                                    <option value="Web Design" <?php echo ($selected_service == 'Web Design') ? 'selected' : ''; ?>>Web Design & Development</option>
                                    <option value="Content Marketing" <?php echo ($selected_service == 'Content Marketing') ? 'selected' : ''; ?>>Content Marketing</option>
                                    <option value="Email Marketing" <?php echo ($selected_service == 'Email Marketing') ? 'selected' : ''; ?>>Email Marketing</option>
                                    <option value="Complete Digital Marketing" <?php echo ($selected_service == 'Complete Digital Marketing') ? 'selected' : ''; ?>>Complete Digital Marketing Package</option>
                                    <option value="Other">Other (Please specify in message)</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message *</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us about your business, current challenges, and goals. The more details you provide, the better we can help you." required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="agree_terms" name="agree_terms" required>
                                <label class="form-check-label" for="agree_terms">
                                    I agree to the <a href="terms-conditions.php" target="_blank">Terms & Conditions</a> and <a href="privacy-policy.php" target="_blank">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Send Inquiry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Get In Touch With Mumbai's Digital Marketing Experts</h2>
            <p class="section-subtitle">Multiple ways to reach us for your digital marketing needs</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card text-center h-100">
                    <div class="service-icon mx-auto">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5>Visit Our Office</h5>
                    <p><?php echo SITE_ADDRESS; ?></p>
                    <p class="small text-muted">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card text-center h-100">
                    <div class="service-icon mx-auto">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h5>Call Us</h5>
                    <p><a href="tel:<?php echo SITE_PHONE; ?>" class="text-decoration-none"><?php echo SITE_PHONE; ?></a></p>
                    <p class="small text-muted">Free consultation call<br>Response within 2 hours</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card text-center h-100">
                    <div class="service-icon mx-auto">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5>Email Us</h5>
                    <p><a href="mailto:<?php echo SITE_EMAIL; ?>" class="text-decoration-none"><?php echo SITE_EMAIL; ?></a></p>
                    <p class="small text-muted">Detailed proposals<br>Response within 24 hours</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="service-card text-center h-100">
                    <div class="service-icon mx-auto">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h5>WhatsApp Chat</h5>
                    <p><a href="javascript:void(0)" onclick="openWhatsApp()" class="text-decoration-none">Chat Now</a></p>
                    <p class="small text-muted">Instant responses<br>Quick queries and support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Map Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title">Find Us in Mumbai</h2>
            <p class="section-subtitle">Located in the heart of Mumbai's business district</p>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="service-card">
                    <!-- Google Map Embed -->
                    <div class="map-container" style="height: 400px; border-radius: 10px; overflow: hidden;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.9947147847894!2d72.8776559!3d19.0759837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9b5b2b1b1b1%3A0x1b1b1b1b1b1b1b1b!2sMumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin" 
                            width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Common questions about our digital marketing services in Mumbai</p>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How long does it take to see SEO results?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                SEO is a long-term strategy. You can expect to see initial improvements in 3-4 months, with significant results in 6-12 months. Our Mumbai SEO experts focus on sustainable, white-hat techniques that provide lasting results.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                What's included in your social media marketing packages?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our social media packages include content creation, posting schedule, community management, paid advertising campaigns, performance analytics, and monthly reports. We customize packages based on your business needs and budget.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Do you work with businesses outside Mumbai?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! While we're based in Mumbai, we serve clients across India including Delhi, Bangalore, Pune, Chennai, and other major cities. Our digital marketing services are delivered remotely with regular communication and reporting.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                What's your pricing structure?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our pricing is customized based on your specific needs, business size, and goals. We offer flexible monthly packages starting from ₹15,000 for basic SEO to comprehensive digital marketing solutions. Contact us for a personalized quote.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>