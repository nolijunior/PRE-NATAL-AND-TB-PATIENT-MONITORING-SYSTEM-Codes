<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Our Services - LungLife Care Health Clinic</title>

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

/* Services Grid */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 40px auto;
}
.services-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
}
.service-box {
    background:white;
    flex:1 1 250px;
    max-width: 300px;
    padding: 30px 20px;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    text-align: center;
    transition:0.3s;
}
.service-box:hover { box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
.service-box i {
    font-size: 50px;
    color: #0b6b4a;
    margin-bottom: 15px;
}
.service-box h3 {
    font-size: 22px;
    color: #0b6b4a;
    margin-bottom: 10px;
}
.service-box p {
    font-size: 16px;
    color: #555;
    line-height: 1.6;
}

/* Responsive */
@media(max-width:768px){
    header .container { flex-direction: column; align-items: flex-start; }
    .services-grid { flex-direction: column; align-items: center; }
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
    <h1>Our Services</h1>
    <p>Specialized Care for Pre-Natal and Tuberculosis Patients</p>
</section>

<!-- Services Section -->
<div class="container">
    <div class="services-grid">
        <div class="service-box">
            <i class="fas fa-baby"></i>
            <h3>Pre-Natal Care</h3>
            <p>Comprehensive prenatal services including regular checkups, fetal monitoring, nutritional counseling, and preparation for a safe delivery.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-lungs"></i>
            <h3>Tuberculosis (TB) Care</h3>
            <p>Dedicated TB management services including screening, diagnosis, medication adherence programs, and follow-up monitoring for patients.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-stethoscope"></i>
            <h3>General Consultation</h3>
            <p>Medical consultation for overall health assessment, prevention, and guidance tailored to every patient’s needs.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-notes-medical"></i>
            <h3>Diagnostic Services</h3>
            <p>Lab tests, imaging, and other diagnostic procedures to ensure accurate evaluation of patient health.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-procedures"></i>
            <h3>Inpatient & Outpatient Care</h3>
            <p>Comfortable care facilities with attentive medical support for both inpatient and outpatient services.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-pills"></i>
            <h3>Medication & Pharmacy</h3>
            <p>On-site pharmacy for prescribed medications and patient counseling to ensure proper treatment adherence.</p>
        </div>
    </div>
</div>

</body>
</html>
