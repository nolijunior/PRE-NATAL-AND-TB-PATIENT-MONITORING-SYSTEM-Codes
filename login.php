<?php
session_start();
require_once 'db.php';

$error = '';
$success = ''; // Add this line

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_input = trim($_POST['user_input']); // email or username
    $password = trim($_POST['password']);

    if(empty($user_input) || empty($password)){
        $error = "Please fill in all fields.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? OR username=? LIMIT 1");
        $stmt->bind_param("ss", $user_input, $user_input);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 1){
            $user = $result->fetch_assoc();
            if($password === $user['password']){
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['full_name'] = $user['full_name'];
                $_SESSION['role'] = $user['role'];

                if($user['role'] === 'admin'){
                    header("Location: admin/admin_dashboard.php");
                    exit();
                } else {
                    header("Location: user/user_dashboard.php");
                    exit();
                }
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No account found with that email or username.";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>LLCHC Portal</title>

  <!-- Fonts + icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    :root{
      --brand-green:#0b6b4a;
      --brand-green-soft:#9fb9a9;
      --bg:#f6f9f8;
      --card:#ffffff;
      --muted:#6b7a75;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family:'Poppins',sans-serif;
      background: linear-gradient(180deg,#f7fbfa 0%, #ffffff 100%);
      color:#233;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      min-height:100vh;
      display:flex;
      align-items:stretch;
      justify-content:center;
    }

    /* Layout wrapper */
    .login-layout{
      width:100%;
      max-width:1200px;
      margin:40px 20px;
      display:grid;
      grid-template-columns: 1fr 1fr;
      gap:40px;
      align-items:stretch;
    }

    /* Left column: form */
    .left {
      background: var(--card);
      border-radius:12px;
      box-shadow:0 10px 30px rgba(11,107,74,0.06);
      padding:48px 50px;
      display:flex;
      flex-direction:column;
      gap:18px;
      justify-content:flex-start;
    }
    .brand {
      display:flex;
      align-items:center;
      gap:18px;
      margin-bottom:8px;
    }
    .brand .logo-img{
      width:120px;         /* big logo like Chong Hua */
      height:120px;
      object-fit:contain;
      border-radius:6px;
      background:#fff;
      padding:8px;
      box-shadow:0 6px 18px rgba(0,0,0,0.04);
      cursor:pointer;
    }
    .brand .title{
      font-size:20px;
      font-weight:700;
      color:var(--brand-green);
    }
    .brand .subtitle{
      font-size:13px;
      color:var(--muted);
      margin-top:4px;
    }

    h1.login-title{
      margin:14px 0 6px;
      font-size:26px;
      color:#0b6b4a;
    }
    p.login-intro{
      margin:0 0 18px;
      color:var(--muted);
    }

    form.login-form{width:100%}
    label.field{display:block;font-size:13px;color:#334; margin-bottom:6px; font-weight:600}
    input.input, .input[type="email"], .input[type="password"]{
      width:100%;
      padding:14px 16px;
      border-radius:8px;
      border:1px solid #e6e9e7;
      font-size:15px;
      margin-bottom:16px;
      background:#fff;
      transition:box-shadow .15s, border-color .15s;
    }
    input.input:focus{outline:none;border-color:var(--brand-green);box-shadow:0 4px 18px rgba(11,107,74,0.08)}

    .forgot-link{font-size:13px;color:var(--muted);text-align:right;display:block;margin-top:-8px;margin-bottom:10px}

    button.btn-primary{
      width:100%;
      background:var(--brand-green);
      color:#fff;
      padding:14px;
      border-radius:10px;
      border:none;
      font-weight:700;
      font-size:16px;
      cursor:pointer;
      box-shadow:0 8px 24px rgba(11,107,74,0.12);
      transition:transform .08s ease,opacity .12s;
    }
    button.btn-primary:hover{transform:translateY(-2px)}
    .alt-note{margin-top:12px;text-align:center;color:var(--muted);font-size:14px}
    .alt-note a{color:var(--brand-green);font-weight:600;text-decoration:none}

    /* Right column: hero/illustration */
    .right {
      background: linear-gradient(180deg, rgba(11,107,74,0.04), rgba(11,107,74,0.02));
      border-radius:12px;
      padding:20px;
      display:flex;
      align-items:center;
      justify-content:center;
      position:relative;
      overflow:hidden;
    }
    .illustration {
      width:100%;
      max-width:520px;
      display:flex;
      align-items:center;
      justify-content:center;
    }
    .cta-bubble{
      position:absolute;
      top:28px;
      left:28px;
      background:var(--brand-green);
      color:#fff;
      padding:12px 16px;
      border-radius:8px;
      font-weight:700;
      box-shadow:0 8px 22px rgba(11,107,74,0.12);
    }
    .cta-bubble small{display:block;font-weight:500;font-size:13px;color: #e6f4ef}

    /* flash message */
    .flash {
      background:#fff3f2;
      color:#a1161a;
      border:1px solid #f5c2c0;
      padding:10px 12px;
      border-radius:8px;
      margin-bottom:10px;
      font-weight:600;
    }

    /* footer small */
    footer.login-footer{
      margin-top:18px;
      text-align:left;
      font-size:13px;
      color:var(--muted);
    }

    /* Responsive */
    @media (max-width:980px){
      .login-layout{grid-template-columns:1fr;max-width:920px}
      .brand .logo-img{width:96px;height:96px}
      .right{order:-1;padding:28px}
      .cta-bubble{left:20px;top:18px}
    }
    @media (max-width:520px){
      .left{padding:22px}
      .brand .logo-img{width:80px;height:80px}
    }
  </style>
</head>
<body>

  <main class="login-layout" role="main" aria-label="Patient login">

    <!-- LEFT: Login form -->
    <section class="left" aria-labelledby="login-heading">
      <?php if (!empty($_SESSION['flash'])): ?>
        <div class="flash" role="status"><?php echo htmlspecialchars($_SESSION['flash']); unset($_SESSION['flash']); ?></div>
      <?php endif; ?>

      <div class="brand" role="banner">
        <!-- clickable logo -> home -->
        <a href="index.php" title="LungLife Care Home">
          <img src="img/logo.png" alt="LungLife Care Logo" class="logo-img">
        </a>
        <div>
          <div class="title">LungLife Care Health Clinic</div>
          <div class="subtitle">Pre-natal &amp; TB scheduling</div>
        </div>
      </div>

      <h1 id="login-heading" class="login-title">Log In</h1>

      <?php if($error): ?>
        <div class="alert error"><?php echo $error; ?></div>
      <?php endif; ?>

      <?php if($success): ?>
        <div class="alert success"><?php echo $success; ?></div>
      <?php endif; ?>

      <form class="login-form" method="post" autocomplete="off" novalidate>

      <label class="field" for="user_input">Email or Username</label>
      <input id="user_input" class="input" type="text" name="user_input" placeholder="Enter email or username" required>

      <label class="field" for="password">Password</label>
      <input id="password" class="input" type="password" name="password" placeholder="Enter your password" required>

      <button type="submit" class="btn-primary" aria-label="Sign in">Log in</button>

</form>

      <div class="alt-note">
        Don’t have an account? <a href="signup.php">Sign up here</a>
      </div>
    </section>

    <!-- RIGHT: Illustration + CTA -->
    <aside class="right" aria-hidden="false">
      <div class="cta-bubble" role="note">
        Not yet registered?
        <small>Click Sign Up to create an account</small>
      </div>

      <div class="illustration" aria-hidden="true">
        <!-- Use an SVG/PNG illustration that matches the right-side image.
             Replace file name if different. -->
        <img src="img/login.jpg" alt="Patient portal illustration" style="max-width:100%;height:auto;">
      </div>
    </aside>

  </main>

</body>
</html>

