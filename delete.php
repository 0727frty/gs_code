<?php
//1. POSTデータ取得(id,name,url,cmt)
$id   = $_GET["id"];

//2. DB接続します
include("funcs.php");
$pdo = db_con();

//３．UPDATE
$sql ="DELETE FROM gs_bm_table WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  // $error = $stmt->errorInfo();
  // exit("SQL_ERROR:".$error[2]);
  sqlError($stmt);
}else{
  header("Location: index.php");
  exit;
}
?>
