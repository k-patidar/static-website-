# Quick Setup Instructions

## 🔧 Local Setup (5 minutes)

### 1. Install XAMPP
- Download from: https://www.apachefriends.org/
- Install and start Apache + MySQL services

### 2. Copy Project Files
```bash
# Copy entire project folder to:
C:\xampp\htdocs\digital-marketing-agency\
# (Windows)

/Applications/XAMPP/htdocs/digital-marketing-agency/
# (Mac)

/opt/lampp/htdocs/digital-marketing-agency/
# (Linux)
```

### 3. Setup Database
1. Open browser: `http://localhost/phpmyadmin`
2. Create new database: `digital_marketing_agency`
3. Import file: `database/inquiries.sql`
   - Click "Import" tab
   - Choose file: `database/inquiries.sql`
   - Click "Go"

### 4. Access Website
- **Main Website**: `http://localhost/digital-marketing-agency/`
- **Admin Panel**: `http://localhost/digital-marketing-agency/admin/`
  - Username: `admin`
  - Password: `admin123`

## 🌐 Alternative: Online Demo

### Option 1: Use Online PHP Playground
1. Go to: https://onecompiler.com/php
2. Copy-paste the PHP code
3. Limited functionality (no database)

### Option 2: Free Hosting Demo
1. Sign up for free hosting: 
   - InfinityFree: https://infinityfree.net/
   - 000webhost: https://www.000webhost.com/
   - Heroku: https://heroku.com/
2. Upload files via FTP
3. Setup database
4. Get live URL

### Option 3: GitHub Pages (Static Version)
1. Create GitHub repository
2. Upload files
3. Enable GitHub Pages
4. Get: `https://username.github.io/repo-name`
   (Note: PHP won't work, only HTML/CSS/JS)

## 📱 Quick Preview (Static)

Since you want to see it immediately, here's what the website looks like:

### Homepage Features:
- Hero section with "Grow Your Business with Mumbai's Leading Digital Marketing Agency"
- Services preview (SEO, Social Media, PPC, Web Design, Content, Email)
- Client testimonials with 5-star ratings
- Call-to-action sections

### Pages Included:
- Home (index.php)
- About Us (about.php) 
- Services (services.php)
- Contact (contact.php)
- Terms & Conditions
- Privacy Policy
- Sitemap
- Admin Panel

### Key Features:
✅ Fully responsive (mobile-friendly)
✅ Contact form with validation
✅ Admin panel to manage inquiries
✅ SEO optimized with schema markup
✅ WhatsApp integration
✅ Google Maps integration
✅ Performance optimized

## 🚨 Troubleshooting

### Common Issues:
1. **"Database connection failed"**
   - Check if MySQL is running in XAMPP
   - Verify database name in `includes/config.php`

2. **"Page not found"**
   - Ensure files are in correct directory
   - Check Apache is running

3. **"Form not submitting"**
   - Check PHP errors in XAMPP logs
   - Verify database table exists

### Need Help?
- XAMPP Tutorial: https://www.apachefriends.org/faq.html
- PHP Tutorial: https://www.w3schools.com/php/
- MySQL Tutorial: https://www.w3schools.com/mysql/

## 🎯 Next Steps After Setup:
1. Test all functionality
2. Customize content for your business
3. Add real images
4. Deploy to production hosting
5. Configure domain and SSL