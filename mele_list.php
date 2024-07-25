<?php
session_start();
include("funcs.php");
sschk();

$pdo = db_conn();

// ユーザーのMele一覧を取得
$stmt = $pdo->prepare("SELECT * FROM gs_mele_table WHERE user_id = :user_id ORDER BY created_at DESC");
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$status = $stmt->execute();

$view = "";
if ($status == false) {
    sql_error($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>' . h($result['song_name']) . ' (追加日時: ' . h($result['created_at']) . ')</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Mele一覧（曲）</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('img/hawaii.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h1 {
            color: #9c27b0;
            text-align: center;
            margin-bottom: 30px;
        }
        .navbar {
            background-color: rgba(156, 39, 176, 0.8);
            padding: 10px 0;
            display: flex;
            align-items: center;
        }
        .navbar-brand {
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            margin-left: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background-color: #9c27b0;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #7b1fa2;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 70%;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #9c27b0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #7b1fa2;
        }
        .mele-list {
            margin-top: 20px;
        }
        .mele-list p {
            background-color: #f0f0f0;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a class="navbar-brand" href="user_top.php">ユーザーページ</a>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
        </nav>
    </header>

    <div class="container">
        <h1>Mele一覧（曲）</h1>
        
        <form action="mele_add.php" method="POST">
            <input type="text" name="song_name" placeholder="曲名を入力" required>
            <button type="submit">追加</button>
        </form>

        <div class="mele-list">
            <?= $view ?>
        </div>
    </div>
</body>
</html>