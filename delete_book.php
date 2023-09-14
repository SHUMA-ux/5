<?php
require_once("db_connect.php");
require_once("function.php");
check_user_logged_in();

$id = $_GET['id'];
if (empty($id)) {
    header("Location: main.php");
    exit;
}

$pdo = connect();

try {
    $sql = "DELETE FROM books WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: screen_3_main.php");
    exit;
} catch (PDOException $e) {
    exit('データベース接続失敗。' . $e->getMessage());
}