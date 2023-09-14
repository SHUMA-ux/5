<?php 
require_once("db_connect.php");
require_once("function.php");
check_user_logged_in();
create_book_data();
?>



<!DOCTYPE html>
<html>
<head>
    <title>本 登録ページ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center_small">
        <h1>本 登録画面</h1>
        <br>
        <p>
            <form method="POST" action="">
            <p><input type="text" name="title" id="title" placeholder="タイトル"></p>
                <br>
            <p><input type="date" name="date" id="date" placeholder="発売日"></p>
                <br>
            <p>
                <h2>在庫数</h2>
                <br>
                <select name="stock" id="stock" laceholder="選択してください">
                <option value="" disabled selected>選択してください</option>
                <?php for ($i = 1; $i <= 100; $i++){
                    echo "<option value='$i'>$i</option>";
                } ?>
                </select>
                <br>
                <input type="submit" value="登録"  id="post" name="post">
            </p>
            </form>
        </p>
    </div>
</body>
</html>