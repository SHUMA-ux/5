<?php 
require_once("db_connect.php");
require_once("function.php");
CreateUserData()
?>

<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="center_small">
        <h1>ユーザー登録画面</h1>
        <br>
        <p>
            <form method="POST" action="">
                <p><input type="text" name="name" id="name" placeholder="ユーザー名"></p>
                <br>
                <p><input type="password" name="password" id="password" placeholder="パスワード"></p>
                <br>
                <p><input type="submit" value="新規登録" id="signUp" name="signUp"></p>
            </form>
        </p>
    </div>
</body>
</html>