<?php
require_once 'config.php';

// Set default page variables if not set
$page_title = $page_title ?? DEFAULT_TITLE;
$page_description = $page_description ?? DEFAULT_DESCRIPTION;
$page_keywords = $page_keywords ?? DEFAULT_KEYWORDS;
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Meta Tags -->
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
    <meta name="author" content="<?php echo SITE_NAME; ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo SITE_URL . '/' . $current_page . '.php'; ?>">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL . '/' . $current_page . '.php'; ?>">
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo SITE_URL; ?>/assets/images/favicon.ico">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" as="style">
    <link rel="preload" href="<?php echo SITE_URL; ?>/assets/css/style.css" as="style">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
    
    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "<?php echo SITE_NAME; ?>",
        "description": "<?php echo htmlspecialchars($page_description); ?>",
        "url": "<?php echo SITE_URL; ?>",
        "telephone": "<?php echo SITE_PHONE; ?>",
        "email": "<?php echo SITE_EMAIL; ?>",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Mumbai",
            "addressRegion": "Maharashtra",
            "addressCountry": "IN"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "19.0760",
            "longitude": "72.8777"
        },
        "openingHours": "Mo-Fr 09:00-18:00",
        "priceRange": "$$",
        "serviceArea": {
            "@type": "GeoCircle",
            "geoMidpoint": {
                "@type": "GeoCoordinates",
                "latitude": "19.0760",
                "longitude": "72.8777"
            },
            "geoRadius": "50000"
        },
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Digital Marketing Services",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "SEO Services",
                        "description": "Search Engine Optimization services to improve website ranking"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Social Media Marketing",
                        "description": "Comprehensive social media marketing and management services"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "PPC Advertising",
                        "description": "Pay-per-click advertising campaigns on Google and social platforms"
                    }
                }
            ]
        }
    }
    </script>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?php echo SITE_URL; ?>">
                <i class="fas fa-rocket me-2"></i><?php echo SITE_NAME; ?>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'index') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'about') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>/about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'services') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>/services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'contact') ? 'active' : ''; ?>" href="<?php echo SITE_URL; ?>/contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="<?php echo SITE_URL; ?>/contact.php">Get Quote</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>