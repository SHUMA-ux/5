<?php 
function CreateUserData(){
    if (!empty($_POST)) {
        if (empty($_POST["name"])) {
            echo "ユーザー名が未入力です。";
        }
        if (empty($_POST["password"])) {
            echo "パスワードが未入力です。";
        }
        if (!empty($_POST["name"]) && !empty($_POST["password"])) {
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
            $pass = htmlspecialchars($_POST['password'], ENT_QUOTES);
            $pdo = connect();
            $password_hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (name, password) VALUES (:name, :password);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':password', $password_hash);
            $stmt->execute();
            header("Location: screen_2_login.php");
            exit();
        } 
    }
}


function CheckUserData(){
    if (!empty($_POST)) {
        if (empty($_POST["name"])) {
            echo "ユーザー名が未入力です。";
        }
        if (empty($_POST["pass"])) {
            echo "パスワードが未入力です。";
        }
        if (!empty($_POST["name"]) && !empty($_POST["pass"])) {
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
            $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
            $pdo = connect();
            try {
                $sql = "SELECT * FROM users WHERE name = :name";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->execute();
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
                die();
            }

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($pass, $row["password"])) {
                    $_SESSION["user_id"] = $row['id'];
                    $_SESSION["user_name"] = $row['name'];
                    header("Location: screen_3_main.php");
                    exit;
                } else {
                    echo "パスワードに誤りがあります。";
                }
            } else {
                echo "ユーザー名かパスワードに誤りがあります。";
            }
        }
    }
}

function check_user_logged_in(){
    if (empty($_SESSION["user_name"])) {
        header("Location: screen_2_login.php");
        exit;
    }
}


function create_book_data(){
    if (!empty($_POST)) {
        if (empty($_POST['title'])) {
            echo "タイトルが未入力です。";
        }
        if (empty($_POST['date'])) {
            echo "発売日が未入力です。";
        }
        if (empty($_POST['stock'])) {
            echo "在庫数が未入力です。";
        }
        if (!empty($_POST['title']) && !empty($_POST['date'])&& !empty($_POST['stock'])) {
            $pdo = connect();
            $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
            $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
            $stock = htmlspecialchars($_POST['stock'], ENT_QUOTES);
            $converted_date = date('Y-m-d', strtotime($date));
            $sql = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $converted_date, PDO::PARAM_STR);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute();
            header("Location: screen_3_main.php");
            exit;
        }
    }
}



?>