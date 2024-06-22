<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>User Dashboard</h1>
        <nav>
            <a href="forum.php">Forum</a>
            <a href="php/logout.php">Logout</a>
        </nav>
    </header>
    <main>
        <h2>Welcome, User!</h2>
        <!-- User-specific content goes here -->
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>
