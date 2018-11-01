<?php
session_start();

//1. POSTデータ取得(id,name,url,cmt)
$id = $_POST["id"];
$name = $_POST["name"];
$lid   = $_POST["lid"];
$lpw  = $_POST["lpw"];
$kanri_flg  = $_POST["kanri_flg"];

//2. DB接続します
include("funcs.php");
$pdo = db_con();

//３．UPDATE
$hash = password_hash ($lpw, PASSWORD_DEFAULT);
$sql ="UPDATE gs_user_table SET name=:name,lid=:lid,lpw=:lpw,kanri_flg=:kanri_flg WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $hash, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  // $error = $stmt->errorInfo();
  // exit("SQL_ERROR:".$error[2]);
  sqlError($stmt);
}else{
  //５．index.phpへリダイレクト
  header("Location: user.php");
  exit;
}
?>
