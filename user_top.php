
<?php
session_start();
include("funcs.php");
sschk();

// 管理者が誤ってこのページにアクセスした場合のリダイレクト
if(isset($_SESSION["kanri_flg"]) && $_SESSION["kanri_flg"] == 1){
    redirect("select.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Hula Note ユーザーページ</title>
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
        .user-greeting {
        color: white;
        margin-left: auto;
        margin-right: 20px;
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
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
        <a class="navbar-brand" href="logout.php">ログアウト</a>
        <span class="user-greeting"><?= isset($_SESSION["name"]) ? h($_SESSION["name"]) : "ゲスト" ?>さん、Aloha！</span>
        </nav>
    </header>

    <div class="container">
        <h1>Hula Note ユーザーページ</h1>
        <p>おかえりなさい！<?= isset($_SESSION["name"]) ? h($_SESSION["name"]) : "ゲスト" ?>さん！</p>
        <p>ここにユーザー向けのコンテンツを追加予定です。</p>
        <a href="user_profile.php" class="btn">プロフィール閲覧</a>
        <a href="mele_list.php" class="btn">Mele一覧（曲）</a>
    </div>
</body>
</html>