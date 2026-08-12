<?php
session_start();

$error = '';

if (isset($_POST['login'])) {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'moh') {
        $_SESSION['logged2'] = true;
        header('Location: index.php', true, 302);
        exit;
    } else {
        $error = 'Wrong secret, try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f2f2f2;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }
    .box {
        background: #fff;
        padding: 30px 40px;
        border-radius: 6px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.15);
        width: 280px;
    }
    h2 {
        margin-top: 0;
        font-size: 18px;
        color: #333;
    }
    input[type=text] {
        width: 100%;
        padding: 8px;
        margin: 8px 0 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    button {
        width: 100%;
        padding: 8px;
        background: #4a6cf7;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover { background: #3a5ce0; }
    .error { color: #c0392b; font-size: 13px; margin-bottom: 10px; }
    .hint { color: #888; font-size: 12px; margin-top: 12px; }
</style>
</head>
<body>
    <div class="box">
        <h2>Login</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST">
            <label for="password">Secret</label>
            <input type="text" id="password" name="password" value="moh">
            <button type="submit" name="login">Log in</button>
        </form>
        <div class="hint">Pass "moh" is already filled in tap to log</div>
    </div>
</body>
</html>
