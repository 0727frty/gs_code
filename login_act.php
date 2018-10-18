<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//1. DB接続します
include "funcs.php";
$pdo = db_con();

//2．
// $sql = "SELECT * FROM gs_user_table WHERE lid=:lid";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
// $res = $stmt->execute();

$sql = "SELECT * FROM gs_user_table WHERE lid=:lid AND life_flg=0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$res = $stmt->execute();

if ($res == false) {
    sqlError($stmt);
}

//3.抽出データ数を取得
$val = $stmt->fetch();//1レコードだけ取得する方法

//4.該当レコードがあればSESSIONに値を代入
// if( $val["id"] != "" ){
if( password_verify($lpw, $val["lpw"]) ){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["name"] = $val['name'];
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION["id"] = $val['id'];
    //login処理OKの場合select.phpへ遷移
    header("Location:index.php");
}else{
    //login処理NGの場合login.phpへ遷移
    header("Location:login.php");
}
//処理終了
exit();
?>