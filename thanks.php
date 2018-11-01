<?php
session_start();

//1. POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$image = $_POST["image"];

include("funcs.php");
$pdo = db_con();

$hash = password_hash ($password, PASSWORD_DEFAULT);
$sql ="INSERT INTO members(name,email,password,picture,created)VALUES(:name,:email,:password,:picture,sysdate())"; 
$stmt = $pdo->prepare($sql);
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
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Memory</title>

	<link rel="stylesheet" href="/msg/css/style.css" />
</head>

<body>
<div id="wrap">
  <div id="head">
    <h1>会員登録</h1>
  </div>
  <div id="content">
		<p>ユーザー登録が完了しました</p>
		<p><a href="login.php">ログインする</a></p>
  </div>

</div>
</body>
</html>
