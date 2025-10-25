    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5><i class="fas fa-rocket me-2"></i><?php echo SITE_NAME; ?></h5>
                    <p class="mb-3">Leading digital marketing agency in Mumbai helping businesses grow online with innovative SEO, social media, and PPC strategies.</p>
                    <div class="social-links">
                        <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/about.php">About Us</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/services.php">Services</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/contact.php">Contact</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/sitemap.php">Sitemap</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Services</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo SITE_URL; ?>/services.php#seo">SEO Services</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/services.php#social-media">Social Media Marketing</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/services.php#ppc">PPC Advertising</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/services.php#web-design">Web Design</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/services.php#content">Content Marketing</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Contact Info</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i><?php echo SITE_ADDRESS; ?></li>
                        <li><i class="fas fa-phone me-2"></i><?php echo SITE_PHONE; ?></li>
                        <li><i class="fas fa-envelope me-2"></i><?php echo SITE_EMAIL; ?></li>
                        <li><i class="fas fa-clock me-2"></i>Mon - Fri: 9:00 AM - 6:00 PM</li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="<?php echo SITE_URL; ?>/privacy-policy.php" class="me-3">Privacy Policy</a>
                    <a href="<?php echo SITE_URL; ?>/terms-conditions.php">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <a href="javascript:void(0)" onclick="openWhatsApp()" class="whatsapp-float" title="Chat with us on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
    
    <!-- Google Analytics (Replace with your tracking ID) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID');
    </script>
</body>
</html>