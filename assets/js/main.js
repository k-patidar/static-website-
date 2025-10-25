// Main JavaScript for Digital Marketing Agency Website

document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Form validation and submission
    const inquiryForm = document.getElementById('inquiryForm');
    if (inquiryForm) {
        inquiryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Client-side validation
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const mobile = document.getElementById('mobile').value.trim();
            const message = document.getElementById('message').value.trim();
            
            let isValid = true;
            
            // Name validation
            if (name.length < 2) {
                showError('name', 'Name must be at least 2 characters long');
                isValid = false;
            } else {
                clearError('name');
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showError('email', 'Please enter a valid email address');
                isValid = false;
            } else {
                clearError('email');
            }
            
            // Mobile validation (Indian format)
            const mobileRegex = /^[6-9]\d{9}$/;
            if (!mobileRegex.test(mobile)) {
                showError('mobile', 'Please enter a valid 10-digit mobile number');
                isValid = false;
            } else {
                clearError('mobile');
            }
            
            // Message validation
            if (message.length < 10) {
                showError('message', 'Message must be at least 10 characters long');
                isValid = false;
            } else {
                clearError('message');
            }
            
            if (isValid) {
                // Submit form via AJAX
                const formData = new FormData(inquiryForm);
                
                fetch('pages/submit_inquiry.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showSuccessMessage('Thank you! Your inquiry has been submitted successfully. We will contact you soon.');
                        inquiryForm.reset();
                    } else {
                        showErrorMessage(data.message || 'An error occurred. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showErrorMessage('An error occurred. Please try again.');
                });
            }
        });
    }

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });

    // Animate elements on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observe all service cards and testimonials
    document.querySelectorAll('.service-card, .testimonial-card').forEach(el => {
        observer.observe(el);
    });
});

// Helper functions
function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorDiv = field.parentNode.querySelector('.error-message');
    
    if (errorDiv) {
        errorDiv.textContent = message;
    } else {
        const newErrorDiv = document.createElement('div');
        newErrorDiv.className = 'error-message text-danger small mt-1';
        newErrorDiv.textContent = message;
        field.parentNode.appendChild(newErrorDiv);
    }
    
    field.classList.add('is-invalid');
}

function clearError(fieldId) {
    const field = document.getElementById(fieldId);
    const errorDiv = field.parentNode.querySelector('.error-message');
    
    if (errorDiv) {
        errorDiv.remove();
    }
    
    field.classList.remove('is-invalid');
}

function showSuccessMessage(message) {
    const alertDiv = document.createElement('div');
    alertDiv.className = 'alert alert-success alert-dismissible fade show';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    const form = document.getElementById('inquiryForm');
    form.parentNode.insertBefore(alertDiv, form);
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
        alertDiv.remove();
    }, 5000);
}

function showErrorMessage(message) {
    const alertDiv = document.createElement('div');
    alertDiv.className = 'alert alert-danger alert-dismissible fade show';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    const form = document.getElementById('inquiryForm');
    form.parentNode.insertBefore(alertDiv, form);
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
        alertDiv.remove();
    }, 5000);
}

// WhatsApp integration
function openWhatsApp() {
    const message = encodeURIComponent("Hi! I'm interested in your digital marketing services. Please provide more information.");
    const whatsappURL = `https://wa.me/919876543210?text=${message}`;
    window.open(whatsappURL, '_blank');
}

// Performance optimization - Lazy loading images
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
}