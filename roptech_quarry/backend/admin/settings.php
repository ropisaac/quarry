<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings - Roptech Quarry Admin</title>
    <style>
        /* Reuse styles from dashboard.php */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #333;
        }
        
        .header {
            background: #2c3e50;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #e74c3c;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .nav-links {
            display: flex;
            gap: 1rem;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .nav-links a:hover {
            background: rgba(255,255,255,0.1);
        }
        
        .logout-btn {
            background: #e74c3c;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .logout-btn:hover {
            background: #c0392b;
        }
        
        .main-content {
            padding: 2rem 0;
        }
        
        .page-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .back-btn {
            background: #6c757d;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 1rem;
        }
        
        .settings-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .btn {
            background: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">Roptech Quarry Admin</div>
                <div class="user-info">
                    <div class="nav-links">
                        <a href="dashboard.php">Dashboard</a>
                        <a href="contacts.php">Messages</a>
                        <a href="settings.php">Settings</a>
                    </div>
                    <span>Welcome, <?php echo $_SESSION['admin_username']; ?></span>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </header>
    
    <main class="main-content">
        <div class="container">
            <div class="page-header">
                <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
                <h1>Admin Settings</h1>
            </div>
            
            <div class="settings-card">
                <h2 style="margin-bottom: 1.5rem; color: #2c3e50;">System Information</h2>
                
                <div class="form-group">
                    <label>PHP Version</label>
                    <input type="text" value="<?php echo phpversion(); ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label>Database Name</label>
                    <input type="text" value="roptech_quarry" readonly>
                </div>
                
                <div class="form-group">
                    <label>Admin Username</label>
                    <input type="text" value="<?php echo $_SESSION['admin_username']; ?>" readonly>
                </div>
                
                <p style="color: #666; font-size: 0.9rem; margin-top: 2rem;">
                    For more advanced settings, please contact your system administrator.
                </p>
            </div>
        </div>
    </main>
</body>
</html>