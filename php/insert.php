<?php
require __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $summary = $_POST['summary'] ?? '';
    $content = $_POST['content'] ?? '';
    $category = $_POST['category'] ?? '';
    $image = $_FILES['image'] ?? null;

    if (empty($title) || strlen($title) < 5 || empty($summary) || strlen($summary) < 10 || empty($content) || strlen($content) < 10 || empty($category) || empty($image)) {
        die('All fields are required and must meet the minimum length requirements.');
    }

    $target_dir = "../images/";
    $target_file = $target_dir . basename($image['name']);
    if (move_uploaded_file($image['tmp_name'], $target_file)) {
        $image_path = basename($image['name']);
    } else {
        die('Sorry, there was an error uploading your file.');
    }

    $stmt = $conn->prepare("INSERT INTO news (title, summary, content, image, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $title, $summary, $content, $image_path, $category);

    if ($stmt->execute()) {
        header('Location: ../index.php?success=1');
        exit();
    } else {
        die('Error: ' . $stmt->error);
    }
}
?>
