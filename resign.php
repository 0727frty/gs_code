<?php
session_start();
//1. POSTデータ取得(id,name,url,cmt)
$id   = $_SESSION["id"];

//2. DB接続します
include("funcs.php");
$pdo = db_con();

//３．UPDATE
// $sql ="DELETE FROM gs_user_table WHERE id=:id"; 
$sql ="UPDATE gs_user_table SET life_flg=1 WHERE id=:id";
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

    $_SESSION = array();

    //Cookieを保持してあるsessionidの保存期間を過去にして破棄
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '',time()-42000, '/');
    }

    //サーバ側での、セッションIDの破棄
    session_destroy();
    
    header("Location: login.php");
    exit;
}
?>
