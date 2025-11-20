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

// Handle status updates
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    
    if ($action === 'mark_read') {
        $contact->updateStatus($id, 'read');
    } elseif ($action === 'mark_replied') {
        $contact->updateStatus($id, 'replied');
    } elseif ($action === 'delete') {
        // Delete contact
        $query = "DELETE FROM contacts WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
    }
    
    header('Location: contacts.php');
    exit;
}

// Get all contacts
$stmt = $contact->readAll();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Messages - Roptech Quarry Admin</title>
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
            justify-content: between;
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
        
        .contacts-table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        
        th {
            background: #2c3e50;
            color: white;
            font-weight: 600;
        }
        
        tr:hover {
            background: #f8f9fa;
        }
        
        .status-new {
            background: #e74c3c;
            color: white;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .status-read {
            background: #3498db;
            color: white;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .status-replied {
            background: #27ae60;
            color: white;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.8rem;
            margin: 2px;
            display: inline-block;
        }
        
        .btn-read {
            background: #3498db;
            color: white;
        }
        
        .btn-replied {
            background: #27ae60;
            color: white;
        }
        
        .btn-delete {
            background: #e74c3c;
            color: white;
        }
        
        .no-messages {
            text-align: center;
            padding: 3rem;
            color: #666;
        }
        
        .message-content {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
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
                <h1>Manage Contact Messages</h1>
            </div>
            
            <?php if (empty($contacts)): ?>
                <div class="no-messages">
                    <h2>No messages yet</h2>
                    <p>Contact form submissions will appear here.</p>
                </div>
            <?php else: ?>
                <div class="contacts-table">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contacts as $contact): ?>
                                <tr>
                                    <td><?php echo $contact['id']; ?></td>
                                    <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                    <td><?php echo htmlspecialchars($contact['email']); ?></td>
                                    <td><?php echo htmlspecialchars($contact['phone']); ?></td>
                                    <td class="message-content" title="<?php echo htmlspecialchars($contact['message']); ?>">
                                        <?php echo htmlspecialchars($contact['message']); ?>
                                    </td>
                                    <td><?php echo date('M j, Y g:i A', strtotime($contact['created_at'])); ?></td>
                                    <td>
                                        <span class="status-<?php echo $contact['status']; ?>">
                                            <?php echo ucfirst($contact['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($contact['status'] !== 'read'): ?>
                                            <a href="?action=mark_read&id=<?php echo $contact['id']; ?>" class="action-btn btn-read">Mark Read</a>
                                        <?php endif; ?>
                                        <?php if ($contact['status'] !== 'replied'): ?>
                                            <a href="?action=mark_replied&id=<?php echo $contact['id']; ?>" class="action-btn btn-replied">Mark Replied</a>
                                        <?php endif; ?>
                                        <a href="?action=delete&id=<?php echo $contact['id']; ?>" class="action-btn btn-delete" onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>