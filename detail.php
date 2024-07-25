<?php
session_start();
$id = $_GET["id"]; //?id~**を受け取る
include("funcs.php");
sschk();
$pdo = db_conn();

$stmt = $pdo->prepare('SELECT * FROM gs_kadai_hula WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Hula Note 会員情報更新</title>
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
      max-width: 600px;
      margin: 50px auto;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      padding-right: 50px;
    }
    h1 {
      color: #9c27b0;
      text-align: center;
      margin-bottom: 30px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      color: #6a1b9a;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #e1bee7;
      border-radius: 5px;
      font-size: 16px;
    }
    .submit-container {
      text-align: center;
      margin-top: 30px;
    }
    input[type="submit"] {
      background-color: #9c27b0;
      color: #fff;
      border: none;
      padding: 12px 30px;
      font-size: 18px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    input[type="submit"]:hover {
      background-color: #7b1fa2;
    }
    .navbar {
      background-color: rgba(156, 39, 176, 0.8);
      padding: 10px 0;
    }
    .navbar-brand {
      color: #fff;
      text-decoration: none;
      font-size: 20px;
      margin-left: 20px;
    }
  </style>
</head>
<body>

<header>
  <nav class="navbar">
    <a class="navbar-brand" href="select.php">データ一覧</a>
  </nav>
</header>

<div class="container">
  <h1>Hula Note 会員情報更新</h1>
  <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= $row["id"] ?>">
        名前：<input type="text" name="name" value="<?= h($row["name"]) ?>"><br>
        年齢：<input type="text" name="age" value="<?= h($row["age"]) ?>"><br>
        Tel：<input type="text" name="tel" value="<?= h($row["tel"]) ?>"><br>
        Email：<input type="text" name="email" value="<?= h($row["email"]) ?>"><br>
        フラ歴：<input type="text" name="hulareki" value="<?= h($row["hulareki"]) ?>"><br>
        教室名：<input type="text" name="halauname" value="<?= h($row["halauname"]) ?>"><br>
        ログインID：<input type="text" name="lid" value="<?= h($row["lid"]) ?>"><br>
        <!-- パスワードは表示しないが、変更用のフィールドを用意 -->
        新しいパスワード：<input type="password" name="lpw"><br>
        管理者フラグ：<input type="checkbox" name="kanri_flg" value="1" <?= $row["kanri_flg"]==1 ? "checked" : "" ?>><br>
        <input type="submit" value="更新">
    </form>
</div>

</body>
</html>