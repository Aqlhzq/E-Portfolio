<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'php/db.php';

$post_id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id='$post_id'";
$post_result = $conn->query($sql);
$post = $post_result->fetch_assoc();

$comment_sql = "SELECT * FROM comments WHERE post_id='$post_id'";
$comment_result = $conn->query($comment_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1><?php echo $post['title']; ?></h1>
        <nav>
            <a href="forum.php">Forum</a>
            <a href="php/logout.php">Logout</a>
        </nav>
    </header>
    <main>
        <div class="post-content">
            <p><?php echo $post['content']; ?></p>
        </div>
        <div class="comments">
            <h2>Comments</h2>
            <?php
            if ($comment_result->num_rows > 0) {
                while($row = $comment_result->fetch_assoc()) {
                    echo "<div class='comment'>";
                    echo "<p>" . $row['content'] . "</p>";
                    echo "<p><small>By User ID: " . $row['user_id'] . "</small></p>";
                    echo "</div>";
                }
            } else {
                echo "No comments found";
            }
            ?>
        </div>
        <div class="comment-form">
            <form action="php/comment.php" method="POST">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <label for="content">Add a Comment:</label>
                <textarea id="content" name="content" required></textarea>
                <button type="submit">Comment</button>
            </form>
        </div>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>
