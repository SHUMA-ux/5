<?php 
require_once("db_connect.php");
require_once("function.php");
check_user_logged_in()
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>メイン</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="center_small">
        <h2>在庫一覧画面</h2>
        <div class="inline-flex">
            <h3><a href="screen_4_createbook.php" class="button_blue" style="text-decoration:none;">新規登録</a></h3>
            <h3><a href="screen_5_logout.php" class="button_grey" style="text-decoration:none;">ログアウト</a></h3>
        </div>

        <table>
            <tr>
                <th>タイトル</th>
                <th>発売日</th>
                <th>在庫数</th>
                <th></th>
            </tr>
            <?php 
            $pdo=connect();
            $sql = "SELECT * from books;";
            $book_data = $pdo->prepare($sql);
            $book_data-> execute();
            while ($row=$book_data->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td><a href="delete_book.php?id=<?php echo $row['id']; ?>" class="button_red" style="text-decoration:none;">削除</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>