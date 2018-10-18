<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>会員登録</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Head[Start] -->
<?php include("header_logout.php") ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="signin_act.php">
    <div class="container">
        <p class="itemTitle">会員登録フォーム</p>

        <div class="form_items">
            <p class="right"><span class="item_name">名前：</span><input id="input_form" type="text" name="name"></p>
            <p class="right"><span class="item_name">ID：</span><input id="input_form" type="text" name="lid"></p>
            <p class="right"><span class="item_name">PASSWORD：</span><input id="input_form" type="text" name="lpw"></p>
        </div>
        
        <input id="btn2" class="block" type="submit" value="会員登録する">
    </div>
</form>


<!-- Main[End] -->

<?php include("footer.php") ?>
</body>
</html>
