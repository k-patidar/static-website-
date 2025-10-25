# Deploy to Free Hosting - Get Live URL in 10 Minutes

## 🆓 Free Hosting Options

### 1. InfinityFree (Recommended)
- **URL**: https://infinityfree.net/
- **Features**: PHP, MySQL, No Ads
- **Steps**:
  1. Sign up for free account
  2. Create new website
  3. Upload files via File Manager
  4. Create MySQL database
  5. Import `inquiries.sql`
  6. Update `config.php` with new database details
  7. Get live URL: `http://yoursite.infinityfreeapp.com`

### 2. 000webhost
- **URL**: https://www.000webhost.com/
- **Features**: PHP, MySQL, Free SSL
- **Steps**:
  1. Create free account
  2. Build website → Upload files
  3. Manage database → Import SQL
  4. Live URL: `https://yoursite.000webhostapp.com`

### 3. Heroku (For PHP)
- **URL**: https://heroku.com/
- **Features**: Professional hosting, Git deployment
- **Steps**:
  1. Create Heroku account
  2. Install Heroku CLI
  3. Deploy via Git
  4. Add ClearDB MySQL addon
  5. Live URL: `https://yourapp.herokuapp.com`

## 🚀 Quick Deploy Script

### For InfinityFree:
```bash
# 1. Download all project files as ZIP
# 2. Upload to InfinityFree File Manager
# 3. Extract in public_html folder
# 4. Create database and import inquiries.sql
# 5. Update includes/config.php with new database details
```

### Database Configuration for Hosting:
```php
// Update in includes/config.php
define('DB_HOST', 'sql123.infinityfree.com'); // Your DB host
define('DB_USER', 'if0_12345678'); // Your DB username  
define('DB_PASS', 'your_password'); // Your DB password
define('DB_NAME', 'if0_12345678_agency'); // Your DB name

// Update site URL
define('SITE_URL', 'https://yoursite.infinityfreeapp.com');
```

## 📱 Alternative: GitHub Pages (Static Preview)

### For immediate preview (no PHP functionality):
1. Create GitHub repository
2. Upload HTML/CSS/JS files
3. Enable GitHub Pages
4. View at: `https://username.github.io/repo-name`

## ⚡ Fastest Option: CodePen/JSFiddle

### For quick HTML/CSS preview:
1. Go to: https://codepen.io/
2. Copy HTML structure from index.php
3. Copy CSS from assets/css/style.css
4. Get shareable link instantly

## 🎯 I Recommend:

**For full functionality**: Use InfinityFree (10 minutes setup)
**For quick preview**: Use local XAMPP setup (5 minutes)
**For sharing**: Deploy to free hosting and get live URL

Would you like me to help you with any specific deployment option?