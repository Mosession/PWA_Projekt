<?php
session_start();
require 'config.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($action == 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT id, username, password, role FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $hashed_password, $role);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                $_SESSION['login_success'] = "You have successfully logged in.";
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No user found with that username.";
        }
        $stmt->close();
    } elseif ($action == 'register') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = 'member';

        if (isset($_POST['admin_code']) && $_POST['admin_code'] === 'admin') {
            $role = 'admin';
        }

        $stmt = $conn->prepare("INSERT INTO user (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $role);
        $stmt->execute();
        $stmt->close();

        $stmt = $conn->prepare("SELECT id, username, role FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($id, $username, $role);
        $stmt->fetch();

        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        $_SESSION['login_success'] = "You have successfully registered and logged in.";

        $stmt->close();

        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-body">
    <div class="auth-container">
        <?php if ($success_message): ?>
            <div class="success-message">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if ($action == 'login'): ?>
            <form id="login-form" class="auth-form" method="POST" action="administration.php?action=login">
                <h1>Login</h1>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
                <?php if (isset($error)): ?>
                    <p class="auth-error"><?php echo $error; ?></p>
                <?php endif; ?>
                <p>Don't have an account? <a href="administration.php?action=register">Register</a></p>
            </form>
        <?php elseif ($action == 'register'): ?>
            <form id="register-form" class="auth-form" method="POST" action="administration.php?action=register">
                <h1>Register</h1>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="admin_code">Admin Code (optional):</label>
                    <input type="text" id="admin_code" name="admin_code">
                </div>
                <button type="submit">Register</button>
                <p>Already have an account? <a href="administration.php?action=login">Login</a></p>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
