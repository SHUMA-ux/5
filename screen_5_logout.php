<?php 
require_once("db_connect.php");
require_once("function.php");
session_destroy();
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="center_small">
            <h1>ログアウトしました</h1>
            <br>
            <br>
            <br>
            <div class="center">
            <h2><a href="screen_2_login.php" class="login_return_button" style="text-decoration:none;">ログイン画面に戻る</a></h2>
            </div>
        </div>
    </body>
</html>