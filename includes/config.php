<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'digital_marketing_agency');

// Site configuration
define('SITE_NAME', 'DigitalBoost Marketing');
define('SITE_URL', 'http://localhost/digital-marketing-agency');
define('SITE_EMAIL', 'info@digitalboost.in');
define('SITE_PHONE', '+91 98765 43210');
define('SITE_ADDRESS', 'Mumbai, Maharashtra, India');

// WhatsApp number (without + and country code)
define('WHATSAPP_NUMBER', '919876543210');

// SEO Meta defaults
define('DEFAULT_TITLE', 'Best Digital Marketing Agency in Mumbai | SEO Services India');
define('DEFAULT_DESCRIPTION', 'Leading digital marketing agency in Mumbai offering SEO, social media marketing, PPC, and web development services. Boost your business growth with our expert team.');
define('DEFAULT_KEYWORDS', 'digital marketing agency Mumbai, SEO services India, social media marketing, PPC advertising, web development, online marketing consultants');

// Database connection
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    die("Database connection failed. Please check your configuration.");
}

// Helper functions
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_mobile($mobile) {
    // Indian mobile number validation (10 digits starting with 6-9)
    return preg_match('/^[6-9]\d{9}$/', $mobile);
}

function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>