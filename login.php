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
<?php include("header_logout.php") ?>
  <div id="content">
		<p>次のフォームに必要事項をご記入ください</p>
    <!-- Main[Start] -->
    <form method="post" action="login_act.php">
      <dl>
        <dt>メールアドレス</dt>
				<dd class="mb20">
					<input type="text" name="email" size="35" maxlength="255">
				</dd>

				<dt>パスワード</dt>
				<dd class="mb20">
					<input type="password" name="password" size="10" maxlength="20">
				</dd>
      <div><input id="btn" type="submit" value="ログイン"></div>
    </form>
  </div>
</div>

</body>
</html>