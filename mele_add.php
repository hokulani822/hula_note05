<?php
session_start();
include("funcs.php");
sschk();

$song_name = filter_input(INPUT_POST, 'song_name');
var_dump($song_name, $_SESSION['user_id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $song_name = filter_input(INPUT_POST, 'song_name');

    $pdo = db_conn();
    $sql = "INSERT INTO gs_mele_table (user_id, song_name) VALUES (:user_id, :song_name)";

    // $stmt = $pdo->prepare("INSERT INTO gs_mele_table (user_id, song_name) VALUES (:user_id, :song_name)");
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':song_name', $song_name, PDO::PARAM_STR);
    
    $status = $stmt->execute();

    if ($status == false) {
        sql_error($stmt);
    } else {
        redirect("mele_list.php");
    }
} else {
    redirect("mele_list.php");
}
?>
