<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

// Create a new admin user with password "admin123"
$username = "admin";
$password = "admin123";
$email = "admin@roptechquarry.co.ke";

// Hash the password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insert or update admin user
$query = "INSERT INTO admin_users (username, password_hash, email) 
          VALUES (?, ?, ?) 
          ON DUPLICATE KEY UPDATE password_hash = ?";

$stmt = $db->prepare($query);
$stmt->execute([$username, $password_hash, $email, $password_hash]);

if ($stmt->rowCount() > 0) {
    echo "Admin user created/updated successfully!<br>";
    echo "Username: admin<br>";
    echo "Password: admin123<br>";
    echo "Password Hash: " . $password_hash . "<br>";
    echo '<a href="login.php">Go to Login</a>';
} else {
    echo "Error creating admin user.";
}
?>