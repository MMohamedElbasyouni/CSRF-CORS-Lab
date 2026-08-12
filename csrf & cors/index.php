<?php
session_start();

if (@$_SESSION['logged2'] !== true) {
    header('Location: login.php', true, 302);
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php', true, 302);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f2f2f2;
        margin: 0;
        padding: 30px;
        color: #333;
    }
    .wrap { max-width: 700px; margin: 0 auto; }
    h1 { font-size: 22px; margin-bottom: 4px; }
    .sub { color: #777; margin-bottom: 24px; }
    .card {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 16px 20px;
        margin-bottom: 16px;
    }
    .card h2 { font-size: 16px; margin: 0 0 8px; }
    .card p { font-size: 14px; line-height: 1.5; margin: 0 0 10px; color: #555; }
    .card a { color: #4a6cf7; text-decoration: none; font-weight: bold; }
    .card a:hover { text-decoration: underline; }
    form.logout { text-align: right; margin-bottom: 10px; }
    button {
        background: #eee;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 6px 12px;
        cursor: pointer;
    }
    button:hover { background: #ddd; }
</style>
</head>
<body>
<div class="wrap">
    <form class="logout" method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>

    <h1>Dashboard</h1>

    <div class="card">
        <h2>1. CORS</h2>
        <a href="bad_regex.php" target="_blank">bad_regex.php</a>
    </div>

    <div class="card">
        <h2>2. CSRF</h2>
        <a href="settings.php" target="_blank">settings.php</a>
    </div>
</div>
</body>
</html>
