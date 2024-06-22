<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'php/db.php';

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Homework Forum</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="php/logout.php">Logout</a>
        </nav>
    </header>
    <main>
        <h2>Forum Posts</h2>
        <a href="post_homework.php">Post Homework</a>
        <div class="posts">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='post'>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>" . $row['content'] . "</p>";
                    echo "<a href='post.php?id=" . $row['id'] . "'>View Comments</a>";
                    echo "</div>";
                }
            } else {
                echo "No posts found";
            }
            ?>
        </div>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>
