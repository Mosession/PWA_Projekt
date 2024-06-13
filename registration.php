<?php
session_start();
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_project_db";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = 'member';

    $stmt = $conn->prepare("SELECT username FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $message = "Username already exists!";
    } else {
        $stmt = $conn->prepare("INSERT INTO user (first_name, last_name, username, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $first_name, $last_name, $username, $password, $role);
        if ($stmt->execute()) {
            $message = "User registered successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-body">
    <div class="auth-container">
        <form class="auth-form" action="registration.php" method="POST">
            <h1>Registration</h1>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <?php if ($message): ?>
            <div class="auth-message <?php echo strpos($message, 'successfully') !== false ? 'auth-success' : 'auth-error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
