<?php
//DB接続
include("funcs.php");
$pdo = db_conn();

//1. POSTデータ取得
$name      = $_POST["name"];
$age       = $_POST["age"];
$tel       = $_POST["tel"];
$email     = $_POST["email"];
$hulareki  = $_POST["hulareki"];
$halauname = $_POST["halauname"];
$lid       = $_POST["lid"];
$lpw       = password_hash($_POST["lpw"], PASSWORD_DEFAULT);

//3. データ登録SQL作成
$sql = "INSERT INTO gs_kadai_hula(name,age,tel,email,hulareki,halauname,lid,lpw,kanri_flg,life_flg,indate) VALUES(:name,:age,:tel,:email,:hulareki,:halauname,:lid,:lpw,0,0,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':hulareki', $hulareki, PDO::PARAM_INT);
$stmt->bindValue(':halauname', $halauname, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//4. データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  $_SESSION['success_message'] = "登録が完了しました。ログインしてください。";
  redirect("login.php");
}
?>
