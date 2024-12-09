<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $mysqli->real_escape_string($_POST['title']);
    $content = $mysqli->real_escape_string($_POST['content']);

    $mysqli->query("UPDATE posts SET title='$title', content='$content' WHERE id=$id");
    header("Location: admin_dashboard.php");
}

$post_id =