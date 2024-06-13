<?php
session_start();
require __DIR__ . '/../config.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    die('Access denied');
}

if (isset($_POST['news_id'])) {
    $news_id = $_POST['news_id'];

    $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
    $stmt->bind_param('i', $news_id);

    if ($stmt->execute()) {
        header('Location: ../delete_news.php?delete_success=1');
    } else {
        die('Error: ' . $stmt->error);
    }
} else {
    die('News ID not provided');
}
?>
