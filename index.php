<?php
include 'config.php';

// Fetch posts from the database
$result = $mysqli->query("SELECT * FROM posts ORDER BY created_at DESC");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>My Blog</h1>

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="post">
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo $row['content']; ?></p>
            <p><em>Posted on: <?php echo $row['created_at']; ?></em></p>

            <!-- Comment Section -->
            <h3>Comments</h3>
            <div class="comments">
                <?php
                $post_id = $row['id'];
                $comments_result = $mysqli->query("SELECT * FROM comments WHERE post_id = $post_id ORDER BY created_at DESC");
                while ($comment = $comments_result->fetch_assoc()):
                ?>
                    <div class="comment">
                        <strong><?php echo $comment['name']; ?></strong>
                        <p><?php echo $comment['comment']; ?></p>
                        <p><em>Commented on: <?php echo $comment['created_at']; ?></em></p>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Comment Form -->
            <form action="add_comment.php" method="POST">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <input type="text" name="name" placeholder="Your Name" required>
                <textarea name="comment" placeholder="Your Comment" required></textarea>
                <button type="submit">Add Comment</button>
            </form>
        </div>
    <?php endwhile; ?>

    <!-- Add New Post Form -->
    <h2>Add New Post</h2>
    <form action="add_post.php" method="POST">
        <input type="text" name="title" placeholder="Post Title" required>
        <textarea name="content" placeholder="Post Content" required></textarea>
        <button type="submit">Add Post</button>
    </form>
</body>
</html>