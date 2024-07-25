<?php
session_start();
include("funcs.php");
sschk();

// データベース接続
$pdo = db_conn();

// ユーザー情報を取得
if (isset($_SESSION['lid']) && $_SESSION['lid'] != '') {
    $stmt = $pdo->prepare("SELECT * FROM gs_kadai_hula WHERE lid = :lid");
    $stmt->bindValue(':lid', $_SESSION['lid'], PDO::PARAM_STR);
} else {
    $stmt = $pdo->prepare("SELECT * FROM gs_kadai_hula WHERE name = :name");
    $stmt->bindValue(':name', $_SESSION['name'], PDO::PARAM_STR);
}

$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Hula Note プロフィール編集</title>
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
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
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
        .user-greeting {
            color: white;
            margin-left: auto;
            margin-right: 20px;
        }
        .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #9c27b0;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        border: none;
        cursor: pointer;
        font-size: 16px;
        }
        .btn:hover {
        background-color: #7b1fa2;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"], input[type="email"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a class="navbar-brand" href="user_top.php">ユーザーページ</a>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
            <span class="user-greeting"><?= h($user['name']) ?>さん、Aloha！</span>
        </nav>
    </header>

    <div class="container">
        <h1>プロフィール編集</h1>
        <form action="user_profile_update.php" method="POST" enctype="multipart/form-data">
            <div class="profile-info">
                <p><label>名前：</label><input type="text" name="name" value="<?= h($user['name']) ?>"></p>
                <p><label>年齢：</label><input type="number" name="age" value="<?= h($user['age']) ?>"></p>
                <p><label>電話番号：</label><input type="text" name="tel" value="<?= h($user['tel']) ?>"></p>
                <p><label>メールアドレス：</label><input type="email" name="email" value="<?= h($user['email']) ?>"></p>
                <p><label>フラ歴：</label><input type="number" name="hulareki" value="<?= h($user['hulareki']) ?>">年</p>
                <p><label>教室名：</label><input type="text" name="halauname" value="<?= h($user['halauname']) ?>"></p>
                <div>
                <!-- <label for="image">アイコン画像：</label>
                <input type="file" name="image"> -->
                </div>
            </div>
            <input type="hidden" name="id" value="<?= h($user['id']) ?>">
            <button type="submit" class="btn">更新</button>
        </div>
    </div>
</body>
</html>