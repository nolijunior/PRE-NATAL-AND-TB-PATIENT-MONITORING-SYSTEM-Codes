<?php
// Database connection
$host = "localhost"; // if using Docker: "mysql" | if local: "localhost"
$user = "root";      // MySQL username
$pass = "";          // MySQL password
$db   = "lunglifecare"; 
$conn = new mysqli($host, $user, $pass, $db, 3306);

// Check connection
if($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    echo '<script>alert("Failed to connect DB");</script>';
    exit();
} else {
    // Connected successfully
    // echo "Connected to database!";
}

// Function to sanitize inputs
function sanitize($data){
    global $conn;
    return htmlspecialchars(strip_tags($conn->real_escape_string(trim($data))));
}

// Function to verify user login
function loginUser($emailOrUsername, $password){
    global $conn;
    
    $stmt = $conn->prepare("SELECT user_id, full_name, username, email, password, role FROM users WHERE email=? OR username=? LIMIT 1");
    $stmt->bind_param("ss", $emailOrUsername, $emailOrUsername);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows === 1){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];
            return true;
        } else {
            return false; // Wrong password
        }
    } else {
        return false; // No user found
    }
}

// Function to check if admin is logged in
function isAdmin(){
    return (isset($_SESSION['role']) && $_SESSION['role'] === 'admin');
}

// Function to check if user is logged in
function isUser(){
    return (isset($_SESSION['role']) && $_SESSION['role'] === 'user');
}
?>
