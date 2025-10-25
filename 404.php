<?php
// 404 Error Page
http_response_code(404);

$page_title = "Page Not Found - 404 Error | DigitalBoost Marketing";
$page_description = "The page you're looking for doesn't exist. Explore our digital marketing services including SEO, social media marketing, PPC, and web design in Mumbai.";
$page_keywords = "404 error, page not found, digital marketing services Mumbai, SEO services, social media marketing";

include 'includes/header.php';
?>

<!-- 404 Error Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="service-card">
                    <div class="mb-4">
                        <i class="fas fa-exclamation-triangle" style="font-size: 5rem; color: var(--accent-color);"></i>
                    </div>
                    
                    <h1 class="section-title">404 - Page Not Found</h1>
                    <p class="section-subtitle">Oops! The page you're looking for doesn't exist or has been moved.</p>
                    
                    <div class="mb-4">
                        <p>Don't worry, you can still find what you're looking for:</p>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <a href="<?php echo SITE_URL; ?>" class="btn btn-primary w-100">
                                <i class="fas fa-home me-2"></i>Go to Homepage
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="<?php echo SITE_URL; ?>/services.php" class="btn btn-outline-primary w-100">
                                <i class="fas fa-cogs me-2"></i>View Our Services
                            </a>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="<?php echo SITE_URL; ?>/about.php" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-users me-2"></i>About Us
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-envelope me-2"></i>Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Services -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Popular Digital Marketing Services</h2>
            <p class="section-subtitle">Explore our most requested services while you're here</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-card text-center">
                    <div class="service-icon mx-auto">
                        <i class="fas fa-search"></i>
                    </div>
                    <h5>SEO Services</h5>
                    <p>Rank higher on Google with our proven SEO strategies for Mumbai businesses.</p>
                    <a href="<?php echo SITE_URL; ?>/services.php#seo" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-card text-center">
                    <div class="service-icon mx-auto">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h5>Social Media Marketing</h5>
                    <p>Build brand awareness and engage customers on Facebook, Instagram, LinkedIn.</p>
                    <a href="<?php echo SITE_URL; ?>/services.php#social-media" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-card text-center">
                    <div class="service-icon mx-auto">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h5>PPC Advertising</h5>
                    <p>Get immediate results with Google Ads and Facebook Ads campaigns.</p>
                    <a href="<?php echo SITE_URL; ?>/services.php#ppc" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>