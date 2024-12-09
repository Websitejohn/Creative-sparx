<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch posts from the database
$result = $mysqli->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <h1>Admin Dashboard</h1>
        <p>Welcome, <?php echo $_SESSION['username']; ?>! <a href="logout.php">Logout</a></p>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="index.php">View Blog</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Manage Posts</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td>
                        <a href="edit_post.php?id=<?php echo $row['id']; ?>">Edit</a