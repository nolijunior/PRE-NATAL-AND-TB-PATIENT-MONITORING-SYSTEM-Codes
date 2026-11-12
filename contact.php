<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - LungLife Care Health Clinic</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<style>
body {
    margin:0;
    font-family:'Poppins', sans-serif;
    background:#f0f5f3;
    color:#333;
}

/* Header */
header {
    background: #ffffffcc;
    backdrop-filter: blur(8px);
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    border-bottom: 2px solid #e8f1eb;
    padding: 18px 0;
}
header .container {
    width: 90%;
    margin:auto;
    display:flex;
    justify-content: space-between;
    align-items: center;
}
header .brand-name {
    font-size: 26px;
    font-weight:700;
    color: #0b6b4a;
}
.nav a {
    margin-left: 20px;
    text-decoration:none;
    font-weight:500;
    color:#0b6b4a;
    position: relative;
}
.nav a::after {
    content:'';
    position: absolute;
    width:0;
    height:2px;
    bottom:-2px;
    left:0;
    background: linear-gradient(to right,#0b6b4a,#00e676);
    transition: width 0.3s;
}
.nav a:hover::after { width:100%; }
.nav a:hover { color:#0d835d; }

/* Page Header */
.page-header {
    background: linear-gradient(135deg, #e0f0eb, #eef3f1);
    padding: 80px 20px 50px;
    text-align: center;
}
.page-header h1 {
    font-size: 42px;
    color: #0d5e33;
    margin-bottom: 15px;
}
.page-header p {
    font-size: 20px;
    color: #333;
}

/* Contact Section */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 40px auto;
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: space-between;
}
.contact-info {
    flex:1 1 350px;
}
.contact-info h2 {
    font-size: 28px;
    color:#0b6b4a;
    margin-bottom: 20px;
}
.contact-info p {
    font-size:16px;
    margin-bottom: 15px;
}
.contact-info i {
    color:#0b6b4a;
    margin-right: 10px;
}

/* Contact Form */
.contact-form {
    flex:1 1 450px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}
.contact-form h2 {
    font-size:24px;
    color:#0b6b4a;
    margin-bottom:20px;
}
.contact-form input, .contact-form textarea, .contact-form button {
    width:100%;
    padding:12px 15px;
    margin-bottom:15px;
    border-radius:10px;
    border:1px solid #ccc;
    font-size:15px;
}
.contact-form input:focus, .contact-form textarea:focus {
    border-color:#0b6b4a;
    outline:none;
    box-shadow:0 0 12px rgba(11,107,74,0.2);
}
.contact-form button {
    background:#0b6b4a;
    color:white;
    border:none;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}
.contact-form button:hover {
    background:#00e676;
    color:white;
}

/* Map */
.map {
    width:100%;
    margin-top:40px;
    border-radius:15px;
    overflow:hidden;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

/* Responsive */
@media(max-width:768px){
    .container { flex-direction: column; align-items: center; }
    .contact-form, .contact-info { flex:1 1 100%; }
}
</style>
</head>
<body>

<!-- Header -->
<header>
    <div class="container">
        <div class="brand-name">LungLife Care Health Clinic</div>
        <nav class="nav">
            <a href="/lunglifecare/index.php">Home</a>
            <a href="/lunglifecare/about.php">About</a>
            <a href="/lunglifecare/services.php">Services</a>
            <a href="/lunglifecare/contact.php">Contact</a>
        </nav>
    </div>
</header>

<!-- Page Header -->
<section class="page-header">
    <h1>Contact Us</h1>
    <p>Get in touch with us for inquiries, appointments, or feedback</p>
</section>

<!-- Contact Section -->
<div class="container">
    <!-- Contact Information -->
    <div class="contact-info">
        <h2>Our Contact Details</h2>
        <p><i class="fas fa-map-marker-alt"></i> Poblacion, Tupi, South Cotabato, Philippines</p>
        <p><i class="fas fa-phone-alt"></i> +63 992 473 0763</p>
        <p><i class="fas fa-phone-alt"></i> Manila: (032) 233-8000</p>
        <p><i class="fas fa-envelope"></i> info@lunglifecare.com.ph</p>
        <p><i class="fas fa-clock"></i> Mon - Fri: 8:00 AM - 6:00 PM</p>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
        <h2>Send Us a Message</h2>
        <form method="POST" action="contact_submit.php">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" rows="6" placeholder="Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
</div>

<!-- Map -->
<div class="container">
    <div class="map">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.507346997168!2d125.06605027482497!3d6.583678395269649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f01fb75a8c62a1%3A0x5bbf60da4eb0fbc5!2sTupi%2C%20South%20Cotabato%2C%20Philippines!5e0!3m2!1sen!2sus!4v1699920000000!5m2!1sen!2sus" 
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

</body>
</html>
