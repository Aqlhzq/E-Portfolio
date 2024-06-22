<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];

    $sql = "INSERT INTO comments (content, user_id, post_id) VALUES ('$content', '$user_id', '$post_id')";

    if ($conn->query($sql) === TRUE) {
        // Reward user for commenting
        $reward_sql = "UPDATE users SET rewards = rewards + 1 WHERE id='$user_id'";
        $conn->query($reward_sql);
        header("Location: ../post.php?id=$post_id");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
