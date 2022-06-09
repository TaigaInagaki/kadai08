<?php
require_once('funcs.php');
$pdo = db_conn();
$id = $_GET['id'];

//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM q_an_table WHERE id = :id');
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}
