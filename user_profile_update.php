<?php
session_start();
include("funcs.php");
sschk();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームデータの取得と sanitize
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $hulareki = filter_input(INPUT_POST, 'hulareki', FILTER_SANITIZE_NUMBER_INT);
    $halauname = filter_input(INPUT_POST, 'halauname', FILTER_SANITIZE_STRING);

    // データベース接続
    $pdo = db_conn();

    // SQL文を作成
    $sql = "UPDATE gs_kadai_hula SET name=:name, age=:age, tel=:tel, email=:email, hulareki=:hulareki, halauname=:halauname WHERE id=:id";
    $stmt = $pdo->prepare($sql);

    // パラメータをバインド
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':age', $age, PDO::PARAM_INT);
    $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':hulareki', $hulareki, PDO::PARAM_INT);
    $stmt->bindValue(':halauname', $halauname, PDO::PARAM_STR);

    // SQL実行
    try {
        $status = $stmt->execute();
        if ($status) {
            $_SESSION['success_message'] = "プロフィールが更新されました。";
            redirect("user_profile.php");
        } else {
            throw new Exception("データベースの更新に失敗しました。");
        }
    } catch (Exception $e) {
        echo "エラーが発生しました: " . $e->getMessage();
        exit;
    }
} else {
    echo "不正なアクセスです。";
    exit;
}
?>