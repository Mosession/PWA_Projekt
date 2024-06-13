<?php
session_start();
require __DIR__ . '/config.php';

if (isset($_GET['id'])) {
    $article_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->bind_param('i', $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();
} else {
    die("Article ID not specified.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?> - RP Online</title>
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
                        <?php endif; ?>
                        <li><a id="logoutLink" href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a id="adminLink" href="administration.php?action=login">Administration</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
        <main>
            <article>
                <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                <img src="images/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="article-image">
                <div class="article-content">
                    <?php echo nl2br(htmlspecialchars($article['content'])); ?>
                </div>
            </article>
        </main>
        <footer>
            <p>Mauro Omeragić | JMBAG: 0246111562 | Tehničko veleučilište u Zagrebu | Programiranje web aplikacija</p>
        </footer>
    </div>
    <script src="js/main.js"></script>
</body>
</html>
