<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

include_once '../config/database.php';
include_once '../models/Contact.php';

$database = new Database();
$db = $database->getConnection();
$contact = new Contact($db);

// Get statistics
$newContactsCount = $contact->getNewContactsCount();
$totalContacts = $contact->readAll()->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Roptech Quarry</title>
    <style>
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
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            border-top: 4px solid #e74c3c;
        }
        
        .stat-card h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #e74c3c;
        }
        
        .admin-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        
        .menu-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            border-color: #e74c3c;
        }
        
        .menu-card i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #e74c3c;
        }
        
        .menu-card h3 {
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }
        
        .menu-card p {
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">Roptech Quarry Admin</div>
                <div class="user-info">
                    <span>Welcome, <?php echo $_SESSION['admin_username']; ?></span>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </header>
    
    <main class="main-content">
        <div class="container">
            <h1 style="margin-bottom: 2rem; color: #2c3e50;">Dashboard Overview</h1>
            
            <div class="stats">
                <div class="stat-card">
                    <h3>New Messages</h3>
                    <div class="stat-number"><?php echo $newContactsCount; ?></div>
                    <p>Unread contact form submissions</p>
                </div>
                
                <div class="stat-card">
                    <h3>Total Messages</h3>
                    <div class="stat-number"><?php echo $totalContacts; ?></div>
                    <p>All contact form submissions</p>
                </div>
            </div>
            
            <div class="admin-menu">
                <a href="contacts.php" class="menu-card">
                    <div>📩</div>
                    <h3>Manage Messages</h3>
                    <p>View and manage contact form submissions</p>
                </a>
                
                <a href="../../index.php" class="menu-card">
                    <div>🌐</div>
                    <h3>View Website</h3>
                    <p>Visit the main website</p>
                </a>
                
                <a href="settings.php" class="menu-card">
                    <div>⚙️</div>
                    <h3>Settings</h3>
                    <p>Manage admin settings</p>
                </a>
            </div>
        </div>
    </main>
</body>
</html>