<?php
session_start();
require __DIR__ . '/config.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$stmt = $conn->prepare("SELECT id, title, summary FROM news");
$stmt->execute();
$result = $stmt->get_result();
$news_items = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Garlic</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>The Garlic</h1>
            <?php if (isset($_SESSION['username'])): ?>
                <div class="welcome-text">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</div>
            <?php endif; ?>
            <nav>
                <ul>
                    <li><a id="homeLink" href="index.php">Home</a></li>
                    <li><a id="sportLink" href="sport.php">Sport</a></li>
                    <li><a id="politicsLink" href="politics.php">Politics</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <li><a id="enterNewsLink" href="enter_news.php">Enter News</a></li>
                            <li><a id="deleteNewsLink" href="delete_news.php" class="active">Delete News</a></li>
                        <?php endif; ?>
                        <li><a id="logoutLink" href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a id="adminLink" href="administration.php?action=login">Administration</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
        <main>
            <?php if (isset($_GET['delete_success'])): ?>
                <div class="success-message">
                    News item deleted successfully.
                </div>
            <?php endif; ?>
            <div class="news-container">
            <h2>Delete News</h2>
                <?php foreach ($news_items as $news_item): ?>
                    <div class="news-item">
                        <div class="news-content">
                            <h3><?php echo htmlspecialchars($news_item['title']); ?></h3>
                            <p><?php echo htmlspecialchars($news_item['summary']); ?></p>
                        
                        <br>
                        <form action="php/delete_news.php" method="post" class="inline-form">
                            <input type="hidden" name="news_id" value="<?php echo $news_item['id']; ?>">
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
        <footer>
            <p>Mauro Omeragić | JMBAG: 0246111562 | Tehničko veleučilište u Zagrebu | Programiranje web aplikacija</p>
        </footer>
    </div>
</body>
</html>
