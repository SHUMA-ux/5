<?php 
require_once("db_connect.php");
require_once("function.php");
CheckUserData()
?>

<!doctype html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ログインページ</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="center_small">
        <div class="inline-flex">
                <h1>ログイン画面</h1>
                <h3><a href="screen_1_signup.php" style="text-decoration:none;" class="create_button">新規ユーザー登録</a></h3>
        </div>  
                <p>
                    <form method="post" action="">
                        <p><input type="text" name="name" size="15" placeholder="ユーザー名"></p>
                        <br>
                        <p><input type="text" name="pass" size="15" placeholder="パスワード"></p>
                        <br>
                        <p><input type="submit" value="ログイン"></p>
                    </form>
                </p>
        </div>
    </body>
</html>