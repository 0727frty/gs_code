<?php
//Fileアップロードチェック
if (isset($_FILES["img"]["tmp_name"] )) {
  //情報取得
  $file_name = $_FILES["img"]["tmp_name"];         //"1.jpg"ファイル名取得
  
  //***File名の変更***
  $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得(jpg, png, gif)
  $uniq_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成
  $file_name = $uniq_name; //ユニークファイル名とパス
 
  $img="";  //画像表示orError文字を保持する変数
  // FileUpload [--Start--]
  if ( is_uploaded_file( $_FILES["img"]["tmp_name"] ) ) {
      if ( move_uploaded_file( $_FILES["img"]["tmp_name"], "files/" . $file_name ) ) {
          chmod("files/" . $file_name, 0644 );
      } else {
        echo "ファイルをアップロードできません。";
      }
  } 

}else{
  $img = "画像が送信されていません"; //Error文字
}

//1. POSTデータ取得
$name = $_POST["name"];
$url = $_POST["url"];
$img = $file_name;
$uid = $_POST["uid"];
$biz = $_POST["biz"];
$nvl = $_POST["nvl"];
$cmic = $_POST["cmic"];
$tec = $_POST["tec"];
$other = $_POST["other"];
$cmt = $_POST["cmt"];

//2. DB接続します
include("funcs.php");
$pdo = db_con();

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
