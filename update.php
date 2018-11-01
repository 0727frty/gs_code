<?php
//Fileアップロードチェック
if (isset($_FILES["image"]["tmp_name"] )) {
	//情報取得
	$file_name = $_FILES["image"]["tmp_name"];
	
	//***File名の変更***
	$extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得(jpg, png, gif)
	$uniq_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成
	$file_name = $uniq_name; //ユニークファイル名とパス
   
	$img="";  //画像表示orError文字を保持する変数
	// FileUpload [--Start--]
	if ( is_uploaded_file( $_FILES["image"]["tmp_name"] ) ) {
		if ( move_uploaded_file( $_FILES["image"]["tmp_name"], "member_picture/" . $file_name ) ) {
			chmod("member_picture/" . $file_name, 0644 );
		} else {
		  echo "ファイルをアップロードできません。";
		}
	} 
  }else{
	$img = "画像が送信されていません"; //Error文字
}

session_start();

//1. POSTデータ取得(id,name,url,cmt)
$id = $_SESSION["id"];
$name = $_POST["name"];
$email   = $_POST["email"];
$password  = $_POST["password"];
$image  = $file_name;
$hash = password_hash ($password, PASSWORD_DEFAULT);

//2. DB接続します
include("funcs.php");
$pdo = db_con();

//３．UPDATE
$hash = password_hash ($password, PASSWORD_DEFAULT);
$sql ="UPDATE members SET name=:name,email=:email,password=:password,picture=:picture WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':password', $hash, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':picture', $image, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  // $error = $stmt->errorInfo();
  // exit("SQL_ERROR:".$error[2]);
  sqlError($stmt);
}else{
  //５．index.phpへリダイレクト
  header("Location: post.php");
  exit;
}
?>