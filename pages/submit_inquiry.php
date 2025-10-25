<?php
// Inquiry Form Submission Handler
require_once '../includes/config.php';

// Set content type for JSON response
header('Content-Type: application/json');

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Verify CSRF token
if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid security token']);
    exit;
}

// Sanitize and validate input data
$name = sanitize_input($_POST['name'] ?? '');
$email = sanitize_input($_POST['email'] ?? '');
$mobile = sanitize_input($_POST['mobile'] ?? '');
$service = sanitize_input($_POST['service'] ?? '');
$message = sanitize_input($_POST['message'] ?? '');
$agree_terms = isset($_POST['agree_terms']) ? 1 : 0;

$errors = [];

// Validation
if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Name must be at least 2 characters long';
}

if (empty($email) || !validate_email($email)) {
    $errors[] = 'Please enter a valid email address';
}

if (empty($mobile) || !validate_mobile($mobile)) {
    $errors[] = 'Please enter a valid 10-digit mobile number';
}

if (empty($service)) {
    $errors[] = 'Please select a service';
}

if (empty($message) || strlen($message) < 10) {
    $errors[] = 'Message must be at least 10 characters long';
}

if (!$agree_terms) {
    $errors[] = 'You must agree to the terms and conditions';
}

// Return validation errors
if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

// Check for duplicate submissions (same email within last 5 minutes)
try {
    $stmt = $pdo->prepare("SELECT id FROM inquiries WHERE email = ? AND created_at > DATE_SUB(NOW(), INTERVAL 5 MINUTE)");
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => false, 'message' => 'You have already submitted an inquiry recently. Please wait before submitting again.']);
        exit;
    }
} catch (PDOException $e) {
    error_log("Database error checking duplicates: " . $e->getMessage());
}

// Get client IP and user agent for tracking
$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

// Insert inquiry into database
try {
    $stmt = $pdo->prepare("
        INSERT INTO inquiries (name, email, mobile, service, message, ip_address, user_agent, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())
    ");
    
    $result = $stmt->execute([
        $name,
        $email,
        $mobile,
        $service,
        $message,
        $ip_address,
        $user_agent
    ]);
    
    if ($result) {
        $inquiry_id = $pdo->lastInsertId();
        
        // Send email notification (optional - configure SMTP settings)
        $email_sent = send_inquiry_notification($inquiry_id, $name, $email, $mobile, $service, $message);
        
        // Log successful submission
        error_log("New inquiry submitted - ID: $inquiry_id, Name: $name, Email: $email, Service: $service");
        
        echo json_encode([
            'success' => true, 
            'message' => 'Thank you for your inquiry! We will contact you within 24 hours.',
            'inquiry_id' => $inquiry_id
        ]);
    } else {
        throw new Exception('Failed to insert inquiry');
    }
    
} catch (PDOException $e) {
    error_log("Database error inserting inquiry: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Database error occurred. Please try again later.']);
} catch (Exception $e) {
    error_log("General error submitting inquiry: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'An error occurred. Please try again later.']);
}

/**
 * Send email notification for new inquiry
 */
function send_inquiry_notification($inquiry_id, $name, $email, $mobile, $service, $message) {
    try {
        $to = SITE_EMAIL;
        $subject = "New Inquiry from " . SITE_NAME . " Website - #" . $inquiry_id;
        
        $email_body = "
        <html>
        <head>
            <title>New Website Inquiry</title>
        </head>
        <body>
            <h2>New Inquiry Received</h2>
            <p><strong>Inquiry ID:</strong> #$inquiry_id</p>
            <p><strong>Date:</strong> " . date('Y-m-d H:i:s') . "</p>
            <hr>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Mobile:</strong> $mobile</p>
            <p><strong>Service Interested:</strong> $service</p>
            <p><strong>Message:</strong></p>
            <p>" . nl2br(htmlspecialchars($message)) . "</p>
            <hr>
            <p>Please respond to this inquiry within 24 hours.</p>
            <p>You can view all inquiries in the admin panel.</p>
        </body>
        </html>
        ";
        
        $headers = [
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=UTF-8',
            'From: ' . SITE_NAME . ' <noreply@' . parse_url(SITE_URL, PHP_URL_HOST) . '>',
            'Reply-To: ' . $email,
            'X-Mailer: PHP/' . phpversion()
        ];
        
        return mail($to, $subject, $email_body, implode("\r\n", $headers));
        
    } catch (Exception $e) {
        error_log("Email notification error: " . $e->getMessage());
        return false;
    }
}
?>