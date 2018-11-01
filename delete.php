<?php
session_start();
include("funcs.php");
loginCheck();
$pdo = db_con();

if (isset($_SESSION['id'])) {
	$id = $_REQUEST['id'];
	// 投稿を検査する
	$messages = $pdo->prepare('SELECT * FROM posts WHERE id=?');
	$messages->execute(array($id));
	$message = $messages->fetch();
	if ($message['member_id'] == $_SESSION['id']) {
		// 削除する
		$del = $pdo->prepare('DELETE FROM posts WHERE id=?');
		$del->execute(array($id));
	}
}
header('Location: post.php'); exit();
?>
