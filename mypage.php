<?php
session_start();
include("funcs.php");
loginCheck();
$pdo = db_con();

$id = $_SESSION["id"];
$sql = "SELECT * FROM members WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


if($status==false) {
  sqlError($stmt);
}else{
    $row = $stmt->fetch();
}

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
  <?php include("header.php") ?>
  <div id="content">
		<form action="update.php" method="post" enctype="multipart/form-data">
			<dl>
				<dt>ニックネーム</dt>
				<dd>
					<input type="text" name="name" size="35" maxlength="255" value="<?= $row['name'] ?>">
				</dd>
				<dt>メールアドレス</dt>
				<dd>
					<input type="text" name="email" size="35" maxlength="255" value="<?= $row['email'] ?>">
				</dd>
				<dt>新しいパスワード</dt>
				<dd>
					<input type="password" name="password" size="10" maxlength="20">
				</dd>
				<dt>写真など</dt>
				<dd>
					<input type="file" name="image" size="35">
				</dd>
			</dl>
			<div><input type="submit" value="更新する"></div>
		</form>
  </div>

</div>
</body>
</html>
