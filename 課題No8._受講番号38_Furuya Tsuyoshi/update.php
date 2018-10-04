<?php

//fileをアップロードする処理
if (is_uploaded_file($_FILES["img"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["img"]["tmp_name"], "files/" . $_FILES["img"]["name"])) {
    chmod("files/" . $_FILES["img"]["name"], 0644);
    echo $_FILES["img"]["name"] . "をアップロードしました。";
  } else {
    echo "ファイルをアップロードできません。";
  }
} else {
  echo "ファイルが選択されていません。";
}

//1. POSTデータ取得(id,name,url,cmt)
$id   = $_POST["id"];
$name = $_POST["name"];
$url  = $_POST["url"];
$img  = $_FILES["img"]["name"];
$cmt  = $_POST["cmt"];

//2. DB接続します
include("funcs.php");
$pdo = db_con();

//３．UPDATE
$sql ="UPDATE gs_bm_table SET name=:name,url=:url,img=:img,cmt=:cmt WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':img', $img, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cmt', $cmt, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
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
  header("Location: index.php");
  exit;
}
?>
