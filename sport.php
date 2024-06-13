<?php
session_start();
require __DIR__ . '/php/fetch_news.php';

$news = fetch_news('sport');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RP Online</title>
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
            <?php if (isset($_SESSION['login_success'])): ?>
                <div class="success-message">
                    <?php 
                    echo htmlspecialchars($_SESSION['login_success']); 
                    unset($_SESSION['login_success']);
                    ?>
                </div>
            <?php endif; ?>
            <h2 id="news-header">Sport News</h2>
            <section id="news">
                <?php foreach ($news as $article): ?>
                    <article class="news-item">
                        <img src="images/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="news-image">
                        <div class="news-content">
                            <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                            <p><?php echo htmlspecialchars($article['summary']); ?></p>
                            <a href="article.php?id=<?php echo htmlspecialchars($article['id']); ?>">Read More</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </section>
        </main>
        <footer>
            <p>Mauro Omeragić | JMBAG: 0246111562 | Tehničko veleučilište u Zagrebu | Programiranje web aplikacija</p>
        </footer>
    </div>
    <script src="js/main.js"></script>
</body>
</html>
