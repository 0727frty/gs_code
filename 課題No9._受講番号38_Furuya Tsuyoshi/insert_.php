<?php
//1. POSTデータ取得
$id = $_POST["id"];
$uid = $_POST["uid"];
$cmt = $_POST["cmt"];

//2. DB接続します
include("funcs.php");
$pdo = db_con();

$sql = "SELECT * FROM gs_bm_table WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ表示
if($status==false) {
  sqlError($stmt);
}else{
  $row = $stmt->fetch();
}

$name = $row["name"];
$url = $row["url"];
$img = $row["img"];
$biz = $row["biz"];
$nvl = $row["nvl"];
$cmic = $row["cmic"];
$tec = $row["tec"];
$other = $row["other"];

//３．データ登録SQL作成
$sql ="INSERT INTO gs_bm_table(name,url,img,uid,biz,nvl,cmic,tec,other,cmt,indate)VALUES(:name,:url,:img,:uid,:biz,:nvl,:cmic,:tec,:other,:cmt,sysdate())"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':img', $img, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':uid', $uid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':biz', $biz, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':nvl', $nvl, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cmic', $cmic, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':tec', $tec, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':other', $other, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cmt', $cmt, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  // $error = $stmt->errorInfo();
  // exit("SQL_ERROR:".$error[2]);
  sqlError($stmt);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;
}


?>
