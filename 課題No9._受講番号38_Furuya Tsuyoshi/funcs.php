<?php
//共通に使う関数を記述

function h($a)
{
    return htmlspecialchars($a, ENT_QUOTES);

}

function db_con()
{
    //1.  DB接続します
    try {
      return new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('DB_CONNECTION_ERROR:'.$e->getMessage());
    }
}

function sqlError($stmt)
{
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}

function loginCheck(){
  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()){
      echo "LOGIN Error!";
      header("Location:login.php");
      exit();
  }else{
      session_regenerate_id(true);
      $_SESSION["chk_ssid"] = session_id();
  }
}

?>