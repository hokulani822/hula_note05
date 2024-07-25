<?php
session_start();
include("funcs.php");
sschk();

// 管理者以外のアクセスを禁止
if($_SESSION["kanri_flg"] != 1){
    redirect("user_top.php");
}

//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM gs_kadai_hula";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
$values = [];
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
} else {
  //全データ取得
  $values = $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Hula Note 会員一覧</title>
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
    max-width: 90%;
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
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  th, td {
    border: 1px solid #e1bee7;
    padding: 12px;
    text-align: left;
  }
  th {
    background-color: #9c27b0;
    color: white;
  }
  tr:nth-child(even) {
    background-color: rgba(225, 190, 231, 0.3);
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
  .btn-update, .btn-delete {
  display: inline-block;
  padding: 5px 10px;
  margin: 2px;
  border-radius: 5px;
  text-decoration: none;
  color: white;
  }

  .btn-update {
  background-color: #4CAF50;
  }

  .btn-delete {
  background-color: #f44336;
  }

  .btn-update:hover, .btn-delete:hover {
  opacity: 0.8;
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
  <h1>Hula Note 会員一覧</h1>
  <table>
  <tr>
    <th>ID</th>
    <th>名前</th>
    <th>年齢</th>
    <th>Tel</th>
    <th>Email</th>
    <th>フラ歴（年）</th>
    <th>教室名</th>
    <th>登録日時</th>
    <th>変更</th>
  </tr>
  <?php foreach($values as $value): ?>
  <tr>
    <td><?php echo h($value["id"]); ?></td>
    <td><?php echo h($value["name"]); ?></td>
    <td><?php echo h($value["age"]); ?></td>
    <td><?php echo h($value["tel"]); ?></td>
    <td><?php echo h($value["email"]); ?></td>
    <td><?php echo h($value["hulareki"]); ?></td>
    <td><?php echo h($value["halauname"]); ?></td>
    <td><?php echo h($value["indate"]); ?></td>
    <td>
      <a href="detail.php?id=<?php echo h($value['id']); ?>" class="btn-update">更新</a>
      <a href="delete.php?id=<?php echo h($value['id']); ?>" class="btn-delete" onclick="return confirm('本当に削除してもよろしいですか？');">削除</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
</div>

</body>
</html>