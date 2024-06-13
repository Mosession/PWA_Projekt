<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter News</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <li><a id="enterNewsLink" href="enter_news.php" class="active">Enter News</a></li>
                        <?php endif; ?>
                        <li><a id="logoutLink" href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a id="adminLink" href="administration.php?action=login">Administration</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
        <main>
            <form id="newsForm" action="php/insert.php" method="post" enctype="multipart/form-data">
                <h2>Enter News</h2>
                <div class="form-group">
                    <label for="title">Title (at least 5 characters):</label>
                    <input type="text" id="title" name="title" required>
                    <span class="error-message" id="title-error"></span>
                </div>
                <div class="form-group">
                    <label for="summary">Summary (at least 10 characters):</label>
                    <textarea id="summary" name="summary" rows="2" required></textarea>
                    <span class="error-message" id="summary-error"></span>
                </div>
                <div class="form-group">
                    <label for="content">Content (at least 10 characters):</label>
                    <textarea id="content" name="content" rows="5" required></textarea>
                    <span class="error-message" id="content-error"></span>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="">Choose category</option>
                        <option value="sport">Sport</option>
                        <option value="politics">Politics</option>
                    </select>
                </div>
                <button type="submit">Submit News</button>
            </form>
        </main>
        <footer>
            <p>Mauro Omeragić | JMBAG: 0246111562 | Tehničko veleučilište u Zagrebu | Programiranje web aplikacija</p>
        </footer>
    </div>
    <script>
        $(document).ready(function() {
            $('#newsForm').on('submit', function(e) {
                let isValid = true;
                $('.error-message').text('');

                const title = $('#title').val().trim();
                if (title.length < 5) {
                    $('#title-error').text('Title must be at least 5 characters long.');
                    isValid = false;
                }

                const summary = $('#summary').val().trim();
                if (summary.length < 10) {
                    $('#summary-error').text('Summary must be at least 10 characters long.');
                    isValid = false;
                }

                const content = $('#content').val().trim();
                if (content.length < 10) {
                    $('#content-error').text('Content must be at least 10 characters long.');
                    isValid = false;
                }

                if (!isValid) {
                    console.log('Form is invalid, preventing submission.');
                    e.preventDefault(); 
                } else {
                    console.log('Form is valid, submitting...');
                }
            });
        });
    </script>
</body>
</html>
