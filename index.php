<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home - LungLife Care Health Clinic</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<style>
/* ------------------------
   BODY & BACKGROUND
------------------------ */
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: url('/lunglifecare/img/background1.png') no-repeat center center fixed;
    background-size: cover;
    color: #333;
}

/* ------------------------
   TOP CONTACT BAR
------------------------ */
.topbar {
    background: #f4f6f5;
    color: #0b6b4a;
    font-size: 14px;
    padding: 6px 0;
    border-bottom: 1px solid #e0e0e0;
}
.topbar .container {
    width: 90%;
    margin: auto;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.topbar .contact-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

/* ------------------------
   HEADER
------------------------ */
.site-header {
    background: #ffffffcc;
    backdrop-filter: blur(8px);
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    border-bottom: 2px solid #e8f1eb;
    position: relative; /* non-sticky now */
    z-index: 1000;
}
.site-header .container {
    width: 90%;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 0;
}

/* Brand */
.brand-section {
    display: flex;
    align-items: center;
    gap: 14px;
}
.brand-section a {
    display: flex;
    align-items: center;
    gap: 14px;
    color: inherit;
    text-decoration: none; /* remove hover effect */
}
.brand-section img {
    width: 95px;
    height: 95px;
    transition: transform 0.2s ease;
}
.brand-section img:hover {
    transform: scale(1.05);
}
.brand-name {
    font-size: 26px;
    font-weight: 700;
    color: #0b6b4a;
    pointer-events: none; /* disables hover effect */
}
.tagline {
    font-size: 15px;
    color: #666;
    font-weight: 500;
    pointer-events: none; /* disables hover effect */
}

/* ------------------------
   NAVIGATION
------------------------ */
.nav {
    display: flex;
    align-items: center;
    gap: 24px;
}
.nav a {
    position: relative;
    color: #0b6b4a;
    font-weight: 500;
    padding: 4px 0;
    transition: 0.3s;
}
.nav a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    display: block;
    margin-top: 5px;
    right: 0;
    background: linear-gradient(to right, #0b6b4a, #00e676);
    transition: width 0.3s ease;
}
.nav a:hover::after {
    width: 100%;
    left: 0;
    right: auto;
}
.nav a:hover {
    color: #0d835d;
    transform: scale(1.05);
}
.nav .btn {
    background: #0b6b4a;
    color: #fff;
    padding: 8px 18px;
    border-radius: 6px;
    transition: 0.3s;
}
.nav .btn:hover {
    background: #00e676;
    color: #fff;
    transform: scale(1.05);
}

/* ------------------------
   HERO SECTION
------------------------ */
.hero {
    width: 100%;
    height: 88vh;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}
.hero::after {
    content: "";
    position: absolute;
    top:0; left:0;
    width:100%; height:100%;
    background: rgba(255,255,255,0.4);
}
.hero-content {
    position: relative;
    text-align: center;
}
.hero-content h1,
.hero-content p {
    color: #008000; /* solid green */
}

.hero-content h1 {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 15px;
}

.hero-content p {
    font-size: 22px;
    font-weight: 500;
}



/* ------------------------
   SOCIAL LINKS
------------------------ */
.social-links {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    padding: 20px 0;
}
.social-links a img {
    width: 40px;
    height: 40px;
    object-fit: contain;
    transition: transform 0.3s ease, opacity 0.3s ease;
}
.social-links a:hover img {
    transform: scale(1.2);
    opacity: 0.85;
}

/* ------------------------
   FOOTER
------------------------ */
.site-footer {
    font-family: 'Poppins', sans-serif;
    background-color: #fff;
    color: #004d40;
    width: 100%;
    margin-top: 40px;
    border-top: 1px solid #e0e0e0;
}
.footer-container {
    width: 95%;
    margin: auto;
    padding: 40px 0 25px;
    display: grid;
    grid-template-columns: 1.2fr 1fr 1fr 1fr 1fr;
    align-items: start;
    gap: 30px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.footer-logo {
    width: 220px;
    height: auto;
    display: block;
    margin-bottom: 10px;
    transition: transform 0.3s ease;
    cursor: pointer;
}
.footer-logo:hover { transform: scale(1.05); }
.footer-tagline { font-style: italic; color: #004d40; font-size: 15px; margin-top: 5px; }
.footer-col h4 { font-size: 15px; font-weight: 700; margin-bottom: 10px; color: #004d40; text-transform: uppercase; }
.footer-col ul { list-style: none; padding: 0; margin: 0; }
.footer-col ul li { margin: 6px 0; }
.footer-col ul li a { color: #1c3a36; text-decoration: none; transition: color 0.3s; }
.footer-col ul li a:hover { color: #009e77; }
.contact-info li { margin: 5px 0; }
.contact-info i { margin-right: 8px; color: #008f6f; }
.footer-bottom {
    background-color: #004d40;
    color: #fff;
    text-align: center;
    font-size: 14px;
    padding: 15px 0;
}
.footer-bottom a { color: #b2dfdb; text-decoration: none; margin: 0 5px; }
.footer-bottom a:hover { color: #00e676; }

/* ------------------------
   RESPONSIVE
------------------------ */
@media (max-width: 1024px) {
    .footer-container { grid-template-columns: repeat(2, 1fr); text-align: center; }
    .footer-logo { margin: 0 auto; }
}
@media (max-width: 768px) {
    .site-header .container { flex-direction: column; align-items: flex-start; }
    .nav { flex-wrap: wrap; gap: 12px; margin-top: 10px; }
}
@media (max-width: 600px) {
    .footer-container { grid-template-columns: 1fr; text-align: center; }
    .footer-tagline { text-align: center; }
}
</style>
</head>

<body>

<!-- Top Contact Bar -->
<div class="topbar">
  <div class="container">
    <div class="contact-item">
      📞 Tupi, South Cotabato | 09924730763
    </div>
    <div class="contact-item">
      📞 Manila (032) 233-8000 | ✉️ info@lunglifecare.com.ph
    </div>
  </div>
</div>

<!-- Header -->
<header class="site-header">
  <div class="container">
    <div class="brand-section">
      <a href="/lunglifecare/index.php">
        <img src="/lunglifecare/img/logo.png" alt="LungLife Care Logo">
        <div>
          <div class="brand-name">LungLife Care Health Clinic</div>
          <div class="tagline">Caring for every breath. Nurturing every life.</div>
        </div>
      </a>
    </div>
    <nav class="nav">
      <a href="/lunglifecare/index.php">Home</a>
      <a href="/lunglifecare/about.php">About</a>
      <a href="/lunglifecare/services.php">Services</a>
      <a href="/lunglifecare/contact.php">Contact</a>
      <?php if(isset($_SESSION['user'])): ?>
        <a href="/lunglifecare/patient/patient_portal.php">Patient</a>
        <?php if($_SESSION['user']['role'] === 'staff'): ?>
          <a href="/lunglifecare/staff/staff_dashboard.php">Staff</a>
        <?php endif; ?>
        <a href="/lunglifecare/logout.php" class="btn">Logout</a>
      <?php else: ?>
        <a href="/lunglifecare/login.php">Patient Portal</a>
      <?php endif; ?>
    </nav>
  </div>
</header>

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content">
        <h1>The Finest Health Clinic In Town</h1>
        <p>Caring for every breath. Nurturing every life.</p>
    </div>
</section>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-logo-section">
      <a href="/lunglifecare/index.php">
        <img src="/lunglifecare/img/logo.png" alt="LungLife Care Logo" class="footer-logo">
      </a>
      <p class="footer-tagline">Caring for every breath. Nurturing every life.</p>
    </div>

    <div class="footer-col">
      <h4>ABOUT US</h4>
      <ul>
        <li><a href="/lunglifecare/about.php">Our Mission</a></li>
        <li><a href="/lunglifecare/about.php#vision">Vision & Values</a></li>
        <li><a href="/lunglifecare/services.php">Our Services</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>INFORMATION</h4>
      <ul>
        <li><a href="/lunglifecare/login.php">Book Appointment</a></li>
        <li><a href="/lunglifecare/patient_guidelines.php">Patient Guidelines</a></li>
        <li><a href="/lunglifecare/faqs.php">FAQs</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>CONTACT US</h4>
      <ul class="contact-info">
        <li><i class="fas fa-map-marker-alt"></i> Poblacion, Tupi, Philippines</li>
        <li><i class="fas fa-phone-alt"></i> 09924730763</li>
        <li><i class="fas fa-envelope"></i> info@lunglifecare.com.ph</li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>PATIENT PORTAL</h4>
      <ul>
        <li><a href="/lunglifecare/login.php">Login / Register</a></li>
        <li><a href="/lunglifecare/portal_guide.php">Portal Guide</a></li>
      </ul>
    </div>
  </div>

  <!-- SOCIAL LINKS USING IMAGE ICONS -->
<div class="social-links">
    <a href="https://www.facebook.com" target="_blank">
        <img src="/lunglifecare/img/logo-facebook.svg" alt="Facebook">
    </a>
    <a href="https://www.instagram.com" target="_blank">
        <img src="/lunglifecare/img/logo-instagram.svg" alt="Instagram">
    </a>
    <a href="https://www.linkedin.com" target="_blank">
        <img src="/lunglifecare/img/logo-linkedin.svg" alt="LinkedIn">
    </a>
    <a href="https://www.linkedin.com" target="_blank">
        <img src="/lunglifecare/img/logo-x.svg" alt="X">
    </a>
</div>

  <div class="footer-bottom">
    <p>Copyright © <?php echo date('Y'); ?> LungLife Care Health Clinic. All rights reserved.</p>
    <div>
      <a href="/lunglifecare/privacy.php">Privacy Policy</a> |
      <a href="/lunglifecare/terms.php">Terms & Conditions</a> |
      <a href="/lunglifecare/contact.php">Contact</a>
    </div>
  </div>
</footer>

</body>
</html>
