<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
  <link rel="stylesheet" href="css/range.css">
  <link rel="stylesheet" href="css/styles.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>


<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-login">
      <div class="container-fluid">
        <h1 class="navbar-header">
          <a class="navbar-brand" href="index_.php">BookMark.do</a>
        </h1>
      </div>
    </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<form method="post" action="login_act.php">
    <div class="container">
          <p class="itemTitle">ログインフォーム</p>

          <div class="form_items">
            <p class="right"><span class="item_name">ID：</span><input id="input_form" type="text" name="lid"></label></p>
            <p class="right"><span class="item_name">PW：</span><input id="input_form" type="password" name="lpw"></label></p>
          </div>

          <input id="btn2" class="block" type="submit" value="ログイン">
    </div>

    <div class="center">
      <a href="signin.php">会員登録していない方はこちら</a>
    </div>

</form>
<?php include("footer.php") ?>
</body>
</html>