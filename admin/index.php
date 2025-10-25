<?php
// Admin Panel & Frontend Loader
session_start();
require_once '../includes/config.php';

// FRONTEND PAGE LOADER
$frontend_pages = [
    'home' => '../pages/home.php',
    'about' => '../pages/about.php',
    'services' => '../pages/services.php',
    'contact' => '../pages/contact.php',
    'privacy-policy' => '../pages/privacy-policy.php',
    'terms-conditions' => '../pages/terms-conditions.php',
    'sitemap' => '../pages/sitemap.php'
];
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// ADMIN LOGIN LOGIC
if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = sanitize_input($_POST['username']);
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT id, password FROM admin_users WHERE username = ? AND is_active = 1");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];

            $stmt = $pdo->prepare("UPDATE admin_users SET last_login = NOW() WHERE id = ?");
            $stmt->execute([$admin['id']]);
        } else {
            $error = "Invalid username or password";
        }
    }

    if (!isset($_SESSION['admin_logged_in'])) {
        // SHOW LOGIN FORM
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Login - <?php echo SITE_NAME; ?></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light">
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">Admin Login</h4>
                            </div>
                            <div class="card-body">
                                <?php if (isset($error)): ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </form>
                                <div class="mt-3 text-center">
                                    <small class="text-muted">Default: admin / admin123</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
}

// HANDLE LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

// IF ADMIN LOGGED IN, SHOW PANEL
if (isset($_SESSION['admin_logged_in'])) {

    // HANDLE STATUS UPDATES
    if (isset($_POST['update_status'])) {
        $inquiry_id = (int)$_POST['inquiry_id'];
        $new_status = sanitize_input($_POST['status']);

        $stmt = $pdo->prepare("UPDATE inquiries SET status = ? WHERE id = ?");
        $stmt->execute([$new_status, $inquiry_id]);

        $success_message = "Status updated successfully";
    }

    // PAGINATION
    $page_admin = isset($_GET['page_admin']) ? (int)$_GET['page_admin'] : 1;
    $per_page = 10;
    $offset = ($page_admin - 1) * $per_page;

    // TOTAL INQUIRIES
    $stmt = $pdo->query("SELECT COUNT(*) FROM inquiries");
    $total_inquiries = $stmt->fetchColumn();
    $total_pages = ceil($total_inquiries / $per_page);

    // FETCH INQUIRIES
    $stmt = $pdo->prepare("
        SELECT id, name, email, mobile, service, message, status, created_at 
        FROM inquiries 
        ORDER BY created_at DESC 
        LIMIT ? OFFSET ?
    ");
    $stmt->execute([$per_page, $offset]);
    $inquiries = $stmt->fetchAll();

    // STATISTICS
    $stats = [];
    $stmt = $pdo->query("SELECT status, COUNT(*) as count FROM inquiries GROUP BY status");
    while ($row = $stmt->fetch()) {
        $stats[$row['status']] = $row['count'];
    }

    // ADMIN HTML
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel - <?php echo SITE_NAME; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body>
        <!-- NAVBAR -->
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <span class="navbar-brand">
                    <i class="fas fa-shield-alt me-2"></i><?php echo SITE_NAME; ?> - Admin Panel
                </span>
                <div class="d-flex">
                    <a href="../" class="btn btn-outline-light me-2" target="_blank">
                        <i class="fas fa-external-link-alt me-1"></i>View Site
                    </a>
                    <a href="?logout=1" class="btn btn-outline-danger">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </a>
                </div>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php echo $success_message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- STATISTICS CARDS -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4><?php echo $total_inquiries; ?></h4>
                                    <p class="mb-0">Total Inquiries</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-envelope fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4><?php echo $stats['new'] ?? 0; ?></h4>
                                    <p class="mb-0">New Inquiries</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-star fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4><?php echo $stats['contacted'] ?? 0; ?></h4>
                                    <p class="mb-0">Contacted</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-phone fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4><?php echo $stats['converted'] ?? 0; ?></h4>
                                    <p class="mb-0">Converted</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-check fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- INQUIRIES TABLE -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Recent Inquiries</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Service</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($inquiries as $inquiry): ?>
                                <tr>
                                    <td><?php echo $inquiry['id']; ?></td>
                                    <td><?php echo htmlspecialchars($inquiry['name']); ?></td>
                                    <td><a href="mailto:<?php echo $inquiry['email']; ?>"><?php echo htmlspecialchars($inquiry['email']); ?></a></td>
                                    <td><a href="tel:<?php echo $inquiry['mobile']; ?>"><?php echo htmlspecialchars($inquiry['mobile']); ?></a></td>
                                    <td><?php echo htmlspecialchars($inquiry['service']); ?></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 200px;" title="<?php echo htmlspecialchars($inquiry['message']); ?>"><?php echo htmlspecialchars($inquiry['message']); ?></span></td>
                                    <td><span class="badge bg-<?php echo match($inquiry['status']) { 'new'=>'warning','contacted'=>'info','converted'=>'success','closed'=>'secondary',default=>'secondary' }; ?>"><?php echo ucfirst($inquiry['status']); ?></span></td>
                                    <td><?php echo date('M j, Y H:i', strtotime($inquiry['created_at'])); ?></td>
                                    <td>
                                        <form method="POST" class="d-inline">
                                            <input type="hidden" name="inquiry_id" value="<?php echo $inquiry['id']; ?>">
                                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                <option value="new" <?php echo $inquiry['status']=='new'?'selected':''; ?>>New</option>
                                                <option value="contacted" <?php echo $inquiry['status']=='contacted'?'selected':''; ?>>Contacted</option>
                                                <option value="converted" <?php echo $inquiry['status']=='converted'?'selected':''; ?>>Converted</option>
                                                <option value="closed" <?php echo $inquiry['status']=='closed'?'selected':''; ?>>Closed</option>
                                            </select>
                                            <input type="hidden" name="update_status" value="1">
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- PAGINATION -->
                    <?php if($total_pages>1): ?>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php for($i=1;$i<=$total_pages;$i++): ?>
                            <li class="page-item <?php echo $i==$page_admin?'active':''; ?>"><a class="page-link" href="?page_admin=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
    exit;
}

// FRONTEND NAVIGATION & PAGES
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo strtoupper($page); ?> - <?php echo SITE_NAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- FRONTEND NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=home"><?php echo SITE_NAME; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link <?php echo $page=='home'?'active':''; ?>" href="index.php?page=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $page=='about'?'active':''; ?>" href="index.php?page=about">About</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $page=='services'?'active':''; ?>" href="index.php?page=services">Services</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $page=='contact'?'active':''; ?>" href="index.php?page=contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $page=='privacy-policy'?'active':''; ?>" href="index.php?page=privacy-policy">Privacy Policy</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $page=='terms-conditions'?'active':''; ?>" href="index.php?page=terms-conditions">Terms</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $page=='sitemap'?'active':''; ?>" href="index.php?page=sitemap">Sitemap</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php
        if(array_key_exists($page,$frontend_pages)){
            include $frontend_pages[$page];
        } else {
            echo "<h1>404 - Page Not Found</h1>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
