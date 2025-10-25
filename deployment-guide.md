# Production Deployment Guide

## 🌐 Pre-Deployment Checklist

### 1. Domain & Hosting Setup
- [ ] Purchase domain name (e.g., digitalboost.in)
- [ ] Buy hosting (shared/VPS with PHP 7.4+ & MySQL)
- [ ] Point domain to hosting server
- [ ] Set up SSL certificate (Let's Encrypt recommended)

### 2. File Upload
```bash
# Upload all files via FTP/cPanel File Manager
# Maintain directory structure exactly as local
```

### 3. Database Setup
```sql
-- Create production database
CREATE DATABASE your_db_name;

-- Import structure and data
-- Upload inquiries.sql via phpMyAdmin
```

### 4. Configuration Updates

#### Update `includes/config.php`:
```php
// Production database settings
define('DB_HOST', 'localhost'); // or your DB host
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_password');
define('DB_NAME', 'your_db_name');

// Production site settings
define('SITE_NAME', 'Your Agency Name');
define('SITE_URL', 'https://yourdomain.com');
define('SITE_EMAIL', 'info@yourdomain.com');
define('SITE_PHONE', '+91 YOUR PHONE');
define('WHATSAPP_NUMBER', '91XXXXXXXXXX');
```

#### Update `.htaccess` for HTTPS:
```apache
# Uncomment HTTPS redirect lines
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

#### Update `sitemap.xml`:
```xml
<!-- Replace localhost URLs with your domain -->
<loc>https://yourdomain.com/</loc>
```

### 5. Email Configuration
```php
// In pages/submit_inquiry.php
// Configure SMTP settings for production emails
// Use services like SendGrid, Mailgun, or hosting SMTP
```

### 6. Security Hardening
- [ ] Change admin password from default
- [ ] Set strong database passwords
- [ ] Enable firewall rules
- [ ] Regular backups setup
- [ ] Update file permissions (755 for directories, 644 for files)

### 7. SEO Setup
- [ ] Submit sitemap to Google Search Console
- [ ] Set up Google Analytics
- [ ] Configure Google My Business
- [ ] Submit to Bing Webmaster Tools

## 📊 Post-Deployment Testing

### 1. Functionality Test
- [ ] All forms work
- [ ] Database connections active
- [ ] Admin panel accessible
- [ ] Email notifications working

### 2. Performance Test
- [ ] Page load speeds
- [ ] Mobile responsiveness
- [ ] SSL certificate working
- [ ] All redirects functional

### 3. SEO Verification
- [ ] Meta tags displaying correctly
- [ ] Schema markup validates
- [ ] Sitemap accessible
- [ ] Robots.txt working

## 🔧 Maintenance Tasks

### Weekly:
- Check inquiry submissions
- Monitor website uptime
- Review admin panel for new leads

### Monthly:
- Update content for freshness
- Check for broken links
- Review performance metrics
- Backup database

### Quarterly:
- Update PHP/MySQL if needed
- Review and update SEO strategy
- Analyze traffic and conversion data
- Security audit

## 📞 Support Contacts
- Hosting Support: [Your hosting provider]
- Domain Registrar: [Your domain provider]
- Developer: [Your contact info]

## 🚨 Emergency Procedures
1. **Site Down**: Check hosting status, contact provider
2. **Database Issues**: Restore from latest backup
3. **Security Breach**: Change all passwords, scan for malware
4. **Performance Issues**: Check server resources, optimize images