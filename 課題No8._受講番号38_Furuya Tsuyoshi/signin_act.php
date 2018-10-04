<?php

//1. POSTデータ取得
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//2. DB接続します
include("funcs.php");
$pdo = db_con();

//３．データ登録SQL作成
$sql ="INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,life_flg)VALUES(:name,:lid,:lpw,0,0)"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    sqlError($stmt);
}else{
    session_start();

    $sql = "SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
    $res = $stmt->execute();

  //５．index.phpへリダイレクト
    $val = $stmt->fetch();//1レコードだけ取得する方法

    if( $val["id"] != "" ){
        $_SESSION["chk_ssid"] = session_id();
        $_SESSION["name"] = $val['name'];
        $_SESSION["id"] = $val['id'];
        //login処理OKの場合select.phpへ遷移
        header("Location:index.php");
    }else{
        //login処理NGの場合login.phpへ遷移
        header("Location:login.php");
    }
  exit;
}


?>
