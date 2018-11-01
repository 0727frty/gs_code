<?php
//最初にSESSIONを開始！！
session_start();
$email = $_POST["email"];
$password = $_POST["password"];

//0.外部ファイル読み込み

//1.  DB接続します
include("funcs.php");
$pdo = db_con();

$sql = "SELECT * FROM members WHERE email=:email";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$res = $stmt->execute();

if($res==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}

//3.抽出データ数を取得
$val = $stmt->fetch();//1レコードだけ取得する方法

//4.該当レコードがあればSESSIONに値を代入
// if( $val["email"] != "" ){
if( password_verify($password, $val['password']) ){
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["name"]      = $val['name'];
    $_SESSION["id"]      = $val['id'];
    header("Location: post.php");
}else{
    //logout処理を経由して全画面へ
    header("Location: login.php");
}
  
  exit();

?>