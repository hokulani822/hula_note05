<?php
session_start();
include("funcs.php");

// ログイン済みの場合、適切なページにリダイレクト
if(isset($_SESSION["chk_ssid"]) && $_SESSION["chk_ssid"] == session_id()){
    if($_SESSION["kanri_flg"] == 1){
        redirect("select.php");
    }else{
        redirect("user_top.php");
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title> Hula Note へようこそ !</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #9c27b0;
            margin-bottom: 30px;
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
    <div class="container">
        <h1> Hula Note へようこそ !</h1>
        <a href="login.php" class="btn">ログイン</a>
        <a href="register.php" class="btn">新規登録</a>
    </div>
</body>
</html>