<?php 
session_start();
if($_SESSION['logged2']!=true)
	{
		header('Location: login.php', true, 302);
		exit;
	}

if (isset($_SERVER['HTTP_ORIGIN']) && preg_match('#example.com#', $_SERVER['HTTP_ORIGIN']))
	{
		header("Access-Control-Allow-Origin: ".$_SERVER['HTTP_ORIGIN']."");
		header('Access-Control-Allow-Credentials: true');
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Profile</title>
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
    table { width: 100%; border-collapse: collapse; }
    td { padding: 8px 0; font-size: 14px; }
    td.label { color: #777; width: 140px; }
    a.back { display: inline-block; margin-top: 16px; color: #4a6cf7; text-decoration: none; font-size: 13px; }
</style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <h1>My Profile</h1>
        <table>
            <tr><td class="label">Username</td><td>moh</td></tr>
            <tr><td class="label">Email</td><td>moh@example.com</td></tr>
            <tr><td class="label">Password</td><td>mohamed@123</td></tr>
        </table>
        <a class="back" href="index.php">&larr; Back to dashboard</a>
    </div>
</div>
</body>
</html>