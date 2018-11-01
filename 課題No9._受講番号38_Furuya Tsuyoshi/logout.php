<?php
//必ずsession_startは最初に記述
session_start();

//sessionを初期化（空っぽにする）
$_SESSION = array();

//Cookieを保持してあるsessionidの保存期間を過去にして破棄
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '',time()-42000, '/');
}

//サーバ側での、セッションIDの破棄
session_destroy();

//処理後、index.phpへリダイレクト
header("Location:index_.php");
exit();
?>