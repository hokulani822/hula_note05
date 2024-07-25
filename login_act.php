<?php
session_start();
include("funcs.php");

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_kadai_hula WHERE lid=:lid AND life_flg=0");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
    sql_error($stmt);
}

$val = $stmt->fetch();

if(password_verify($lpw, $val["lpw"])){
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION["name"]      = $val['name'];
    $_SESSION['user_id'] = $val['id'];
    
    if($_SESSION["kanri_flg"] == 1){
        redirect("select.php");  // 管理者ページへ
    }else{
        redirect("user_top.php");  // 一般ユーザーページへ
    }
}else{
    $_SESSION['error'] = 'ログインに失敗しました。IDまたはパスワードが間違っています。';
    redirect("login.php");
}
exit();
?>