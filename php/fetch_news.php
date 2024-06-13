<?php
require 'config.php';

function fetch_news($category = null) {
    global $conn;
    $sql = "SELECT id, title, summary, image FROM news";
    if ($category) {
        $sql .= " WHERE category = ?";
    }
    $stmt = $conn->prepare($sql);
    if ($category) {
        $stmt->bind_param("s", $category);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $news = [];
    while ($row = $result->fetch_assoc()) {
        $news[] = $row;
    }
    return $news;
}
?>
