<?php
//DB接続関数
require_once("funcs.php");
$pdo = db_conn();
$id   = $_GET['id'];

//３．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_kadai_hula WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    sql_error($stmt);
} else {
    //*** function化する！*****************
    redirect("select.php");
}
?>
