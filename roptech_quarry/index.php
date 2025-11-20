<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roptech Quarry Limited | Premium Construction Materials in Kenya</title>

    <!-- SEO -->
    <meta name="description" content="Roptech Quarry Limited supplies high-grade ballast, hardcore, aggregates, and quarry dust across Kenya with reliable delivery and top-quality service.">
    <meta name="keywords" content="Roptech, quarry, ballast, hardcore, aggregates, construction materials, Kenya, Eldoret">
    <meta name="author" content="Roptech Quarry Limited">

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- HEADER -->
    <header class="header" id="header">
        <div class="container header-flex">
            <a href="#" class="logo">Roptech <span>Quarry Ltd</span></a>

            <button class="menu-toggle" id="menuToggle">☰</button>

            <nav class="navbar" id="navbar">
                <a href="#about">About</a>
                <div class="dropdown">
                    <a href="#products" class="dropbtn">Products ▼</a>
                    <div class="dropdown-content">
                        <a href="#products">Ballast</a>
                        <a href="#products">Hardcore</a>
                        <a href="#products">Aggregates</a>
                        <a href="#products">Quarry Dust</a>
                    </div>
                </div>
                <a href="#gallery">Gallery</a>
                <a href="#location">Location</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="container hero-content">
            <h1>Premium Construction Materials for a Stronger Kenya</h1>
            <p>Trusted supplier of high-quality ballast, hardcore, aggregates, and quarry dust. Delivered nationwide with reliability and excellence.</p>
            <a href="#contact" class="btn">Request a Quote Today</a>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about" class="section">
        <div class="container">
            <h2>About Roptech Quarry</h2>
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <p style="font-size: 1.2rem; line-height: 1.8; color: #555;">
                    Roptech Quarry Limited stands as a pillar of excellence in Kenya's construction industry. 
                    With years of expertise and commitment to quality, we provide superior construction materials 
                    that build the foundation for Kenya's infrastructure development. Our dedication to timely 
                    delivery and customer satisfaction has made us the preferred choice for contractors, 
                    developers, and government projects nationwide.
                </p>
            </div>
        </div>
    </section>

    <!-- PRODUCTS SECTION -->
    <section id="products" class="section services">
        <div class="container">
            <h2>Our Premium Products</h2>

            <div class="service-list">
                <div class="service-card">
                    <h3>🏗️ Ballast</h3>
                    <p>High-strength, clean ballast perfect for concrete work, foundations, and major structural projects. Consistently graded for optimal performance.</p>
                </div>

                <div class="service-card">
                    <h3>🛣️ Hardcore</h3>
                    <p>Durable hardcore material ideal for road bases, site preparation, compaction, and reinforcement. Excellent load-bearing capacity.</p>
                </div>

                <div class="service-card">
                    <h3>⛰️ Aggregates</h3>
                    <p>Premium crushed stones available in various sizes (3/4", 1/2", 1/4") for concrete, drainage, and construction applications.</p>
                </div>

                <div class="service-card">
                    <h3>💨 Quarry Dust</h3>
                    <p>Fine-grade quarry dust suitable for landscaping, filler material, finishing works, and as a base for paving and flooring.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY SECTION -->
    <section id="gallery" class="section gallery">
        <div class="container">
            <h2>Project Gallery</h2>
            <p style="text-align: center; font-size: 1.1rem; color: #666; margin-bottom: 2rem;">
                Explore our quarry operations, machinery, and successful project implementations
            </p>

            <div class="gallery-grid">
                <img src="images/quarry1.jpg" alt="Quarry Operation 1">
                <img src="images/quarry2.jpg" alt="Quarry Operation 2">
                <img src="images/quarry3.jpg" alt="Quarry Operation 3">
                <img src="images/quarry4.jpg" alt="Quarry Operation 4">
                <img src="images/quarry5.jpg" alt="Quarry Operation 5">
                <img src="images/quarry6.jpg" alt="Quarry Operation 6">
            </div>
        </div>
    </section>

    <!-- LOCATION MAP -->
    <section id="location" class="section">
        <div class="container">
            <h2>Our Location</h2>
            <p style="text-align: center; font-size: 1.1rem; color: #666; margin-bottom: 2rem;">
                Visit our quarry site in Eldoret or contact us for delivery across Kenya
            </p>

            <div class="map-container">
                <iframe
                    width="100%"
                    height="450"
                    style="border:0; border-radius: 12px;"
                    allowfullscreen
                    loading="lazy"
                    src="https://www.google.com/maps?q=0.574632, 35.206583&z=16&output=embed">
                </iframe>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="section contact">
        <div class="container">
            <h2>Get In Touch</h2>
            <p style="text-align: center; font-size: 1.1rem; color: #666; margin-bottom: 3rem;">
                Ready to start your project? Contact us for quotes, deliveries, or any inquiries
            </p>

            <div class="contact-details" style="text-align: center; margin-bottom: 3rem;">
                <div style="display: inline-flex; gap: 3rem; flex-wrap: wrap; justify-content: center;">
                    <div>
                        <h3 style="color: #e74c3c; margin-bottom: 0.5rem;">📞 Phone</h3>
                        <p style="font-size: 1.1rem;">+254 708 596 202</p>
                    </div>
                    <div>
                        <h3 style="color: #e74c3c; margin-bottom: 0.5rem;">✉️ Email</h3>
                        <p style="font-size: 1.1rem;">info@roptechquarry.co.ke</p>
                    </div>
                    <div>
                        <h3 style="color: #e74c3c; margin-bottom: 0.5rem;">📍 Location</h3>
                        <p style="font-size: 1.1rem;">Eldoret, Kenya</p>
                    </div>
                </div>
            </div>

            <form action="backend/save_contact.php" method="POST" class="contact-form">
                <!-- Display success/error messages -->
                <?php 
                if (isset($_SESSION['message'])) {
                    $alert_class = $_SESSION['message_type'] == 'success' ? 'alert-success' : 'alert-error';
                    echo '<div class="alert ' . $alert_class . '">' . $_SESSION['message'] . '</div>';
                    unset($_SESSION['message']);
                    unset($_SESSION['message_type']);
                }
                ?>

                <div class="form-group">
                    <label>Your Full Name</label>
                    <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required placeholder="Enter your full name">
                </div>

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required placeholder="Enter your email address">
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" required placeholder="Enter your phone number">
                </div>

                <div class="form-group">
                    <label>Your Message</label>
                    <textarea name="message" rows="5" required placeholder="Tell us about your project requirements, quantity needed, delivery location, etc."><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                </div>

                <button type="submit" class="btn" style="width: 100%;">Send Message</button>
            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <p style="font-size: 1.1rem; margin-bottom: 1rem;">&copy; 2025 Roptech Quarry Limited | All Rights Reserved.</p>
            <p style="opacity: 0.8;">Building Kenya's Future, One Stone at a Time</p>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('navbar').classList.toggle('active');
        });

        // Header Scroll Effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

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
                    // Close mobile menu if open
                    document.getElementById('navbar').classList.remove('active');
                }
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.matches('.dropbtn')) {
                const dropdowns = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        });
    </script>
</body>
</html>