<?php
session_start();

// if(!empty($_POST)){
// 	if($_POST['name'] == ''){
// 		$error['name'] = 'blank';
// 	}
// 	if($_POST['email'] == ''){
// 		$error['email'] = 'blank';
// 	}
// 	if(strlen($_POST['password']) < 4){
// 		$error['password'] = 'length';
// 	}
// 	if($_POST['password'] == ''){
// 		$error['password'] = 'blank';
// 	}
// 	if(empty($error)){
// 		$_SESSION['join'] = $_POST;
// 		header('Location: check.php');
// 		exit();
// 	}
// }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Memory</title>

	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<div id="wrap">
  <?php include("header_logout.php") ?>
  <div id="content">
		<p>次のフォームに必要事項をご記入ください</p>
		<form action="check.php" method="post" enctype="multipart/form-data">
			<dl>
				<dt>ニックネーム</dt>
				<dd class="mb20">
					<input type="text" name="name" size="35" maxlength="255">
				</dd>
				<dt>メールアドレス</dt>
				<dd class="mb20">
					<input type="text" name="email" size="35" maxlength="255">
				</dd>
				<dt>パスワード</dt>
				<dd class="mb20">
					<input type="password" name="password" size="10" maxlength="20">
				</dd>
				<dt>写真など</dt>
				<dd class="mb20">
					<input type="file" name="image" size="35">
				</dd>
			</dl>
			<div><input id="btn" type="submit" value="入力内容を確認する"></div>
		</form>
  </div>

</div>
</body>
</html>
