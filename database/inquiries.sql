-- Database: digital_marketing_agency
-- Table: inquiries

CREATE DATABASE IF NOT EXISTS digital_marketing_agency;
USE digital_marketing_agency;

-- Create inquiries table
CREATE TABLE IF NOT EXISTS inquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    service VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('new', 'contacted', 'converted', 'closed') DEFAULT 'new',
    ip_address VARCHAR(45),
    user_agent TEXT,
    INDEX idx_created_at (created_at),
    INDEX idx_status (status),
    INDEX idx_email (email)
);

-- Insert sample data for testing
INSERT INTO inquiries (name, email, mobile, service, message, created_at) VALUES
('Rajesh Kumar', 'rajesh@example.com', '9876543210', 'SEO Services', 'I need SEO services for my e-commerce website. Please provide a quote.', '2024-01-15 10:30:00'),
('Priya Sharma', 'priya@example.com', '9876543211', 'Social Media Marketing', 'Looking for social media marketing for my restaurant business in Mumbai.', '2024-01-16 14:20:00'),
('Amit Patel', 'amit@example.com', '9876543212', 'PPC Advertising', 'Want to start Google Ads campaign for my coaching institute.', '2024-01-17 09:15:00'),
('Sneha Gupta', 'sneha@example.com', '9876543213', 'Web Design', 'Need a new website for my fashion boutique with online store.', '2024-01-18 16:45:00'),
('Vikram Singh', 'vikram@example.com', '9876543214', 'Content Marketing', 'Require content marketing strategy for my tech startup.', '2024-01-19 11:30:00');

-- Create admin users table (bonus feature)
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    last_login DATETIME,
    is_active BOOLEAN DEFAULT TRUE
);

-- Insert default admin user (password: admin123)
INSERT INTO admin_users (username, password, email) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@digitalboost.in');

-- Create services table for dynamic service management
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    icon VARCHAR(50) NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    sort_order INT DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert services data
INSERT INTO services (title, description, icon, sort_order) VALUES
('SEO Services', 'Boost your website ranking on Google with our proven SEO strategies. We help businesses in Mumbai and across India achieve top search engine positions.', 'fas fa-search', 1),
('Social Media Marketing', 'Engage your audience and build brand awareness through strategic social media campaigns on Facebook, Instagram, LinkedIn, and Twitter.', 'fas fa-share-alt', 2),
('PPC Advertising', 'Drive immediate traffic and leads with targeted Google Ads and social media advertising campaigns. Maximize your ROI with our expert management.', 'fas fa-bullhorn', 3),
('Web Design & Development', 'Create stunning, responsive websites that convert visitors into customers. Our designs are mobile-friendly and optimized for search engines.', 'fas fa-laptop-code', 4),
('Content Marketing', 'Attract and retain customers with valuable, relevant content. Our content strategies help establish your brand as an industry authority.', 'fas fa-pen-nib', 5),
('Email Marketing', 'Nurture leads and retain customers with personalized email campaigns. Increase sales and customer loyalty with our email marketing expertise.', 'fas fa-envelope', 6);

-- Create testimonials table
CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100) NOT NULL,
    company VARCHAR(100),
    testimonial TEXT NOT NULL,
    rating INT DEFAULT 5,
    is_active BOOLEAN DEFAULT TRUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert testimonials data
INSERT INTO testimonials (client_name, company, testimonial, rating) VALUES
('Rohit Mehta', 'Mehta Electronics', 'DigitalBoost transformed our online presence completely. Our website traffic increased by 300% in just 6 months. Highly recommended for SEO services in Mumbai!', 5),
('Kavita Joshi', 'Joshi Fashion House', 'The social media marketing team is fantastic. They helped us reach thousands of new customers and our sales have doubled. Best digital marketing agency in Mumbai!', 5),
('Suresh Agarwal', 'Agarwal Coaching Classes', 'Their PPC campaigns brought us quality leads at a great cost. The team is professional and delivers results. Thank you for helping our business grow!', 5),
('Neha Kapoor', 'Kapoor Wellness Center', 'Excellent web design and SEO services. Our new website looks amazing and ranks on the first page of Google. Great work by the DigitalBoost team!', 5);