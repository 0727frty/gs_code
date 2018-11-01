<?php
//Fileアップロードチェック
if (isset($_FILES["image"]["tmp_name"] )) {
	//情報取得
	$file_name = $_FILES["image"]["tmp_name"];
	
	//***File名の変更***
	$extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得(jpg, png, gif)
	$uniq_name = date("YmdHis").md5(session_id()) . "." . $extension;  //ユニークファイル名作成
	$file_name = $uniq_name; //ユニークファイル名とパス
   
	$img="";  //画像表示orError文字を保持する変数
	// FileUpload [--Start--]
	if ( is_uploaded_file( $_FILES["image"]["tmp_name"] ) ) {
		if ( move_uploaded_file( $_FILES["image"]["tmp_name"], "member_picture/" . $file_name ) ) {
			chmod("member_picture/" . $file_name, 0644 );
		} else {
		  echo "ファイルをアップロードできません。";
		}
	} 
  }else{
	$img = "画像が送信されていません"; //Error文字
}

session_start();

// var_dump($_POST);
// exit();

//1. POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$image = $file_name;

include("funcs.php");
$pdo = db_con();


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
		<p>次のフォームに必要事項をご記入ください</p>
		<form action="thanks.php" method="post">
			<dl>
				<dt>ニックネーム</dt>
				<dd>
					<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>
					<input type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
				</dd>
				<dt>メールアドレス</dt>
				<dd>
				<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>
				<input type="hidden" name="email" value="<?php echo $_POST['email'] ?>">
				</dd>
				<dt>パスワード</dt>
				<dd>****</dd>
				<input type="hidden" name="password" value="<?php echo $_POST['password'] ?>">
				<dt>画像など</dt>
				<dd>
				<img src="member_picture/<?php echo $file_name; ?>" />
				<input type="hidden" name="image" value="<?php echo $file_name; ?>">
				</dd>
			</dl>
			<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a>| <input type="submit" value="登録する"></div>
		</form>
  </div>

</div>
</body>
</html>
