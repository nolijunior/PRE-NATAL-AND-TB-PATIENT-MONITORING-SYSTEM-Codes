<?php
session_start();
require_once 'db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $contact_number = trim($_POST['contact_number']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if(empty($full_name) || empty($username) || empty($email) || empty($password) || empty($confirm_password)){
        $error = "Please fill in all required fields.";
    } elseif($password !== $confirm_password){
        $error = "Passwords do not match.";
    } else {
        // Check if email or username exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? OR username=? LIMIT 1");
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $error = "Email or Username already exists.";
        } else {
            // Store password as plain text
            $stmt = $conn->prepare("INSERT INTO users (full_name, username, email, address, contact_number, password) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $full_name, $username, $email, $address, $contact_number, $password);
            
            if($stmt->execute()){
                $success = "Account created successfully! Redirecting to login...";
                header("refresh:3;url=login.php");
            } else {
                $error = "Error creating account. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LLCHC Portal</title>
<link rel="stylesheet" href="style.css">
<style>
body {
  background: #f5f6f7;
  font-family: 'Poppins', sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
}

/* ===== CONTAINER ===== */
.container {
  max-width: 600px;
  margin: 60px auto;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 16px rgba(0,0,0,0.08);
  padding: 40px 50px;
}

/* ===== LOGO ===== */
.logo {
  text-align: center;
  margin-bottom: 15px;
}
.logo img {
  width: 100px;
  height: auto;
}

/* ===== HEADER ===== */
h2 {
  text-align: center;
  color: #0b6b4a;
  margin-bottom: 25px;
  font-size: 22px;
}

/* ===== FORM ===== */
form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

label {
  font-weight: 500;
  font-size: 14px;
  color: #333;
}
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 14px;
  transition: 0.2s;
}
input:focus {
  border-color: #0b6b4a;
  outline: none;
  box-shadow: 0 0 3px rgba(11,107,74,0.2);
}

/* ===== PASSWORD RULES ===== */
.password-rules {
  font-size: 12px;
  color: #555;
  margin-top: -8px;
  line-height: 1.5;
}

/* ===== BUTTON ===== */
button {
  padding: 12px;
  border: none;
  border-radius: 8px;
  background-color: #0b6b4a;
  color: #fff;
  font-weight: 600;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
}
button:hover {
  background-color: #0d825c;
  box-shadow: 0 3px 8px rgba(11,107,74,0.3);
}

/* ===== TERMS ===== */
.terms {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
}

/* ===== FOOTER ===== */
footer {
  text-align: center;
  margin-top: 40px;
  color: #666;
  font-size: 13px;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
  .container {
    padding: 30px 25px;
  }
}
.alert { padding:10px; margin-bottom:15px; border-radius:4px; }
.error { background:#f44336; color:white; }
.success { background:#4CAF50; color:white; }
p.login-link { text-align:center; margin-top:15px; }
p.login-link a { color:#4CAF50; text-decoration:none; font-weight:bold; }
</style>
</head>
<body>

<div class="container">
    <div class="logo">
    <a href="index.php">
      <img src="img/logo.png" alt="LungLife Care Health Clinic Logo">
    </a>
  </div>
  <h2>Create Account</h2>

    <?php if($error): ?>
        <div class="alert error"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if($success): ?>
        <div class="alert success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="contact_number" placeholder="Contact Number">
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>

        <button type="submit">Create Account</button>
    </form>

    <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>
