<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us - LungLife Care Health Clinic</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
body {
    margin:0;
    font-family:'Poppins', sans-serif;
    background: #f0f5f3;
    color: #333;
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

/* Main Content */
.container {
    width: 90%;
    max-width: 1100px;
    margin: 40px auto;
    padding: 20px;
}
.section {
    margin-bottom: 60px;
}
.section h2 {
    font-size: 28px;
    color: #0b6b4a;
    margin-bottom: 15px;
    border-bottom: 3px solid #00e676;
    display:inline-block;
    padding-bottom:5px;
}
.section p {
    font-size: 16px;
    line-height: 1.8;
    color: #555;
}

/* Grid for Vision & Mission */
.grid {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-top: 30px;
}
.grid .box {
    flex:1 1 45%;
    background:white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    transition:0.3s;
}
.grid .box:hover { box-shadow:0 10px 25px rgba(0,0,0,0.15); }
.grid .box h3 {
    font-size:20px;
    color:#0b6b4a;
    margin-bottom:10px;
}

/* Responsive */
@media(max-width:768px){
    .grid { flex-direction: column; }
    header .container { flex-direction: column; align-items: flex-start; }
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
    <h1>About LungLife Care Health Clinic</h1>
    <p>Committed to providing compassionate, comprehensive healthcare for every patient.</p>
</section>

<!-- Main Content -->
<div class="container">
    <!-- Our Story -->
    <div class="section">
        <h2>Our Story</h2>
        <p>LungLife Care Health Clinic was founded with the vision of providing top-notch healthcare services to communities in the Philippines. Our clinic combines modern technology, experienced medical professionals, and a compassionate approach to patient care. We aim to make every patient feel valued, heard, and treated with the highest standards of medical excellence.</p>
    </div>

    <!-- Mission & Vision -->
    <div class="section">
        <h2>Mission & Vision</h2>
        <div class="grid">
            <div class="box">
                <h3>Our Mission</h3>
                <p>To deliver personalized healthcare with compassion, ensuring the well-being of every patient through state-of-the-art treatments and holistic care.</p>
            </div>
            <div class="box">
                <h3>Our Vision</h3>
                <p>To become the leading healthcare provider in the Philippines, recognized for excellence, innovation, and patient-centered care that transforms lives.</p>
            </div>
        </div>
    </div>

    <!-- Values -->
    <div class="section">
        <h2>Our Core Values</h2>
        <p>At LungLife Care, our values define who we are and guide every decision we make. They include:</p>
        <ul>
            <li><strong>Compassion:</strong> We treat every patient with empathy and understanding.</li>
            <li><strong>Excellence:</strong> We maintain the highest standards of medical care.</li>
            <li><strong>Integrity:</strong> We are honest, transparent, and accountable in all our practices.</li>
            <li><strong>Innovation:</strong> We embrace the latest medical technology for optimal patient outcomes.</li>
            <li><strong>Community:</strong> We actively support and engage with our local communities.</li>
        </ul>
    </div>
</div>

</body>
</html>
