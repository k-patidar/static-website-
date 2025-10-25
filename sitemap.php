<?php
// Sitemap Page - Dynamic sitemap using PHP
$page_title = "Sitemap - DigitalBoost Marketing | All Pages and Services";
$page_description = "Complete sitemap of DigitalBoost Marketing website. Find all pages including digital marketing services, SEO, social media marketing, PPC, web design, and contact information.";
$page_keywords = "sitemap, website navigation, digital marketing pages, SEO services pages, social media marketing, PPC advertising, web design services";

include 'includes/header.php';

// Define all website pages
$pages = [
    'Main Pages' => [
        ['title' => 'Home', 'url' => 'index.php', 'description' => 'Homepage with overview of our digital marketing services'],
        ['title' => 'About Us', 'url' => 'about.php', 'description' => 'Learn about our team and company history'],
        ['title' => 'Services', 'url' => 'services.php', 'description' => 'Complete list of digital marketing services'],
        ['title' => 'Contact', 'url' => 'contact.php', 'description' => 'Get in touch for free consultation'],
    ],
    'Service Pages' => [
        ['title' => 'SEO Services', 'url' => 'services.php#seo', 'description' => 'Search engine optimization services in Mumbai'],
        ['title' => 'Social Media Marketing', 'url' => 'services.php#social-media', 'description' => 'Facebook, Instagram, LinkedIn marketing'],
        ['title' => 'PPC Advertising', 'url' => 'services.php#ppc', 'description' => 'Google Ads and Facebook Ads management'],
        ['title' => 'Web Design & Development', 'url' => 'services.php#web-design', 'description' => 'Responsive website design and development'],
        ['title' => 'Content Marketing', 'url' => 'services.php#content', 'description' => 'Content creation and marketing strategies'],
        ['title' => 'Email Marketing', 'url' => 'services.php#email', 'description' => 'Email campaign management and automation'],
    ],
    'Legal Pages' => [
        ['title' => 'Terms & Conditions', 'url' => 'terms-conditions.php', 'description' => 'Terms of service and conditions'],
        ['title' => 'Privacy Policy', 'url' => 'privacy-policy.php', 'description' => 'Privacy policy and data protection'],
        ['title' => 'Sitemap', 'url' => 'sitemap.php', 'description' => 'Complete website sitemap'],
    ]
];
?>

<!-- Page Header -->
<section class="hero-section" style="padding: 120px 0 80px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">Website Sitemap</h1>
                <p class="hero-subtitle">Complete navigation guide to all pages and services on our website</p>
            </div>
        </div>
    </div>
</section>

<!-- Sitemap Content -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <?php foreach ($pages as $section => $page_list): ?>
                <div class="service-card mb-4">
                    <h2 class="section-title mb-4"><?php echo $section; ?></h2>
                    <div class="row">
                        <?php foreach ($page_list as $page): ?>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="service-icon me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                                    <i class="fas fa-link"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">
                                        <a href="<?php echo SITE_URL . '/' . $page['url']; ?>" class="text-decoration-none">
                                            <?php echo $page['title']; ?>
                                        </a>
                                    </h5>
                                    <p class="text-muted small mb-1"><?php echo $page['description']; ?></p>
                                    <small class="text-primary"><?php echo SITE_URL . '/' . $page['url']; ?></small>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Additional Information -->
                <div class="service-card">
                    <h2 class="section-title mb-4">Additional Resources</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="service-icon me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">XML Sitemap</h5>
                                    <p class="text-muted small mb-1">Machine-readable sitemap for search engines</p>
                                    <small class="text-primary"><?php echo SITE_URL; ?>/sitemap.xml</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="service-icon me-3" style="width: 40px; height: 40px; font-size: 1rem;">
                                    <i class="fas fa-robot"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Robots.txt</h5>
                                    <p class="text-muted small mb-1">Search engine crawling instructions</p>
                                    <small class="text-primary"><?php echo SITE_URL; ?>/robots.txt</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Navigation -->
                <div class="service-card">
                    <h2 class="section-title mb-4">Quick Navigation</h2>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?php echo SITE_URL; ?>" class="btn btn-outline-primary w-100">
                                <i class="fas fa-home me-2"></i>Home
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?php echo SITE_URL; ?>/services.php" class="btn btn-outline-primary w-100">
                                <i class="fas fa-cogs me-2"></i>Services
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?php echo SITE_URL; ?>/about.php" class="btn btn-outline-primary w-100">
                                <i class="fas fa-users me-2"></i>About Us
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-primary w-100">
                                <i class="fas fa-envelope me-2"></i>Contact
                            </a>
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
                <div class="service-card bg-light">
                    <h3 class="mb-3">About This Sitemap</h3>
                    <p>This sitemap provides a comprehensive overview of all pages available on the DigitalBoost Marketing website. It helps visitors navigate our site and find information about our digital marketing services in Mumbai, including SEO, social media marketing, PPC advertising, web design, content marketing, and email marketing.</p>
                    
                    <p>Our website is regularly updated with new content and resources to help Indian businesses succeed online. If you're looking for specific information or services, you can use this sitemap to quickly find the relevant pages.</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-4 text-center">
                            <h5 class="text-primary"><?php echo count($pages['Main Pages']) + count($pages['Service Pages']) + count($pages['Legal Pages']); ?>+</h5>
                            <p class="small mb-0">Total Pages</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <h5 class="text-primary"><?php echo count($pages['Service Pages']); ?></h5>
                            <p class="small mb-0">Service Pages</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <h5 class="text-primary">Daily</h5>
                            <p class="small mb-0">Content Updates</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section-padding" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); color: white;">
    <div class="container text-center">
        <h2 class="mb-4">Need Help Finding Something?</h2>
        <p class="lead mb-4">Can't find what you're looking for? Contact our team for personalized assistance with your digital marketing needs.</p>
        <a href="contact.php" class="btn btn-light btn-lg">
            <i class="fas fa-headset me-2"></i>Contact Support
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>