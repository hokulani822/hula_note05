<?php
session_start();
include("funcs.php");

if(
    isset($_POST['lid']) && $_POST['lid'] != '' &&
    isset($_POST['lpw']) && $_POST['lpw'] != ''
){
    $lid = $_POST['lid'];
    $lpw = $_POST['lpw'];

    $pdo = db_conn();
    $sql = "SELECT * FROM gs_kadai_hula WHERE lid=:lid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
    $status = $stmt->execute();

    if($status==false){
        sql_error($stmt);
    }

    $val = $stmt->fetch();
    if( password_verify($lpw, $val["lpw"]) ){
        $_SESSION["chk_ssid"]  = session_id();
        $_SESSION["kanri_flg"] = $val['kanri_flg'];
        $_SESSION["name"]      = $val['name'];
        $_SESSION['user_id'] = $val['id'];
        redirect("select.php");
    }else{
        redirect("login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Hula Note ログイン</title>
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
      max-width: 400px;
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
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      color: #6a1b9a;
    }
    input[type="text"], input[type="password"] {
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
    <a class="navbar-brand" href="index.php">TOP</a>
  </nav>
</header>

<div class="container">
  <h1>Hula Note ログイン</h1>
  <form name="form1" action="login_act.php" method="post">
    <div class="form-group">
      <label for="lid">ID：</label>
      <input type="text" id="lid" name="lid">
    </div>
    <div class="form-group">
      <label for="lpw">パスワード：</label>
      <input type="password" id="lpw" name="lpw">
    </div>
    <div class="submit-container">
      <input type="submit" value="ログイン">
    </div>
  </form>
</div>

</body>
</html>