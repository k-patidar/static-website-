<?php
// Terms & Conditions Page
$page_title = "Terms & Conditions - DigitalBoost Marketing | Mumbai Digital Marketing Agency";
$page_description = "Read the terms and conditions for DigitalBoost Marketing's digital marketing services including SEO, social media marketing, PPC, and web design services in Mumbai, India.";
$page_keywords = "terms conditions digital marketing, SEO services terms, social media marketing agreement, PPC advertising terms, web design contract terms";

include 'includes/header.php';
?>

<!-- Page Header -->
<section class="hero-section" style="padding: 120px 0 80px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">Terms & Conditions</h1>
                <p class="hero-subtitle">Please read these terms carefully before using our digital marketing services</p>
                <p class="small text-light">Last updated: <?php echo date('F d, Y'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Terms Content -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="service-card">
                    <h2>1. Acceptance of Terms</h2>
                    <p>By accessing and using the services provided by DigitalBoost Marketing ("we," "our," or "us"), you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>

                    <h2>2. Services Description</h2>
                    <p>DigitalBoost Marketing provides digital marketing services including but not limited to:</p>
                    <ul>
                        <li>Search Engine Optimization (SEO)</li>
                        <li>Social Media Marketing</li>
                        <li>Pay-Per-Click (PPC) Advertising</li>
                        <li>Web Design and Development</li>
                        <li>Content Marketing</li>
                        <li>Email Marketing</li>
                    </ul>

                    <h2>3. Service Agreement</h2>
                    <p>All services are provided based on the agreed scope of work outlined in the service proposal or contract. Any changes to the scope of work must be agreed upon in writing by both parties.</p>

                    <h2>4. Payment Terms</h2>
                    <ul>
                        <li>Payment terms are specified in individual service agreements</li>
                        <li>Monthly services require advance payment</li>
                        <li>Project-based services may require milestone payments</li>
                        <li>Late payments may result in service suspension</li>
                        <li>All prices are in Indian Rupees (INR) unless otherwise specified</li>
                    </ul>

                    <h2>5. Client Responsibilities</h2>
                    <p>The client agrees to:</p>
                    <ul>
                        <li>Provide accurate and complete information</li>
                        <li>Grant necessary access to websites, social media accounts, and advertising platforms</li>
                        <li>Respond to requests for information in a timely manner</li>
                        <li>Review and approve content before publication</li>
                        <li>Comply with all applicable laws and regulations</li>
                    </ul>

                    <h2>6. Intellectual Property</h2>
                    <p>All original content, strategies, and materials created by DigitalBoost Marketing remain our intellectual property until full payment is received. Upon full payment, the client receives usage rights for their business purposes.</p>

                    <h2>7. Confidentiality</h2>
                    <p>We maintain strict confidentiality regarding all client information and business data. We will not disclose any confidential information to third parties without written consent.</p>

                    <h2>8. Performance and Results</h2>
                    <p>While we strive to achieve the best possible results, we cannot guarantee specific outcomes such as search engine rankings, traffic increases, or sales conversions. Digital marketing results depend on various factors including market conditions, competition, and algorithm changes.</p>

                    <h2>9. Limitation of Liability</h2>
                    <p>DigitalBoost Marketing's liability is limited to the amount paid for services. We are not liable for any indirect, incidental, or consequential damages arising from the use of our services.</p>

                    <h2>10. Termination</h2>
                    <p>Either party may terminate the service agreement with 30 days written notice. Upon termination, the client is responsible for payment of all services rendered up to the termination date.</p>

                    <h2>11. Refund Policy</h2>
                    <ul>
                        <li>Setup fees are non-refundable</li>
                        <li>Monthly service fees are refundable on a pro-rata basis if terminated within the first 15 days</li>
                        <li>Project-based services are refundable based on work completed</li>
                        <li>Advertising spend is non-refundable</li>
                    </ul>

                    <h2>12. Force Majeure</h2>
                    <p>We are not liable for any failure or delay in performance due to circumstances beyond our reasonable control, including but not limited to acts of God, natural disasters, war, terrorism, or government actions.</p>

                    <h2>13. Governing Law</h2>
                    <p>These terms and conditions are governed by the laws of India. Any disputes shall be resolved in the courts of Mumbai, Maharashtra.</p>

                    <h2>14. Changes to Terms</h2>
                    <p>We reserve the right to modify these terms at any time. Changes will be effective immediately upon posting on our website. Continued use of our services constitutes acceptance of the modified terms.</p>

                    <h2>15. Contact Information</h2>
                    <p>For questions about these Terms & Conditions, please contact us:</p>
                    <ul class="list-unstyled">
                        <li><strong>Email:</strong> <?php echo SITE_EMAIL; ?></li>
                        <li><strong>Phone:</strong> <?php echo SITE_PHONE; ?></li>
                        <li><strong>Address:</strong> <?php echo SITE_ADDRESS; ?></li>
                    </ul>

                    <div class="text-center mt-4">
                        <a href="contact.php" class="btn btn-primary">Contact Us</a>
                        <a href="privacy-policy.php" class="btn btn-outline-primary ms-2">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>