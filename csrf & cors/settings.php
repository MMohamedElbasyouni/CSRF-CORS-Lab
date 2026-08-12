<?php
session_start();

if (@$_SESSION['logged2'] !== true) {
    header('Location: login.php', true, 302);
    exit;
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
}

if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = 'moh@gmail.com';
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (($_POST['csrf_token'] ?? '') === $_SESSION['csrf_token']) {
        $_SESSION['email'] = $_POST['email'] ?? $_SESSION['email'];
        $message = 'Email updated.';
    } else {
        $message = 'Invalid CSRF token.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CORS Lab - Settings</title>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f2f2f2;
        margin: 0;
        padding: 30px;
        color: #333;
    }
    .wrap { max-width: 500px; margin: 0 auto; }
    .card {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 20px;
    }
    h1 { font-size: 20px; margin: 0 0 16px; }
    label { display: block; font-size: 13px; color: #555; margin-bottom: 4px; }
    input[type=text] {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    button {
        padding: 8px 16px;
        background: #4a6cf7;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover { background: #3a5ce0; }
    .msg { font-size: 13px; margin-bottom: 16px; color: #2a7d2a; }
    a.back { display: inline-block; margin-top: 16px; color: #4a6cf7; text-decoration: none; font-size: 13px; }
</style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <h1>Account Settings</h1>
        <?php if ($message): ?>
            <div class="msg"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <p>Current email: <strong><?php echo htmlspecialchars($_SESSION['email']); ?></strong></p>
        <form method="POST">
            <label for="email">New email</label>
            <input type="text" id="email" name="email" placeholder="new@example.com">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            <button type="submit">Update email</button>
        </form>
        <a class="back" href="index.php">&larr; Back</a>
    </div>
</div>
</body>
</html>
