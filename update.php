<?php
//DB接続関数
session_start();
include("funcs.php");
sschk();
$pdo = db_conn();

//1. POSTデータ取得
$id = $_POST["id"];
$name = $_POST["name"];
$age = $_POST["age"];
$tel = $_POST["tel"];
$email = $_POST["email"];
$hulareki = $_POST["hulareki"];
$halauname = $_POST["halauname"];
$lid = $_POST["lid"];
$kanri_flg = isset($_POST["kanri_flg"]) ? 1 : 0;

//３．データ登録SQL作成
$sql = "UPDATE gs_kadai_hula SET name=:name, age=:age, tel=:tel, email=:email, 
        hulareki=:hulareki, halauname=:halauname, lid=:lid, kanri_flg=:kanri_flg WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':hulareki', $hulareki, PDO::PARAM_STR);
$stmt->bindValue(':halauname', $halauname, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

// パスワードが入力された場合のみ更新
if(!empty($_POST["lpw"])){
    $lpw = password_hash($_POST["lpw"], PASSWORD_DEFAULT);
    $sql = "UPDATE gs_kadai_hula SET lpw=:lpw WHERE id=:id";
    $stmt_pw = $pdo->prepare($sql);
    $stmt_pw->bindValue(':lpw', $lpw, PDO::PARAM_STR);
    $stmt_pw->bindValue(':id', $id, PDO::PARAM_INT);
    $status_pw = $stmt_pw->execute();
}

$status = $stmt->execute();

if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}
?>
