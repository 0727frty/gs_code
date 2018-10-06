<?php
session_start();

include("funcs.php");
loginCheck();

//2. DB接続します
$pdo = db_con();
// var_dump($_SESSION);

//３．SELECT
$id = $_SESSION["id"];
$sql = "SELECT * FROM gs_user_table WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ表示
if($status==false) {
  sqlError($stmt);
}else{
  $uid = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Head[Start] -->
<?php include("header.php") ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php" enctype="multipart/form-data">
  <div class="">
    <div class="view_items">
      <p class="input_item"><span class="item_name">書籍タイトル</span></p><input id="input_box" type="text" name="name">
      <p class="input_item"><span class="item_name">書籍のURL</span></p><input id="input_box" type="text" name="url">
      <p class="input_item"><span class="item_name">書籍のimg</span></p><input type="file" name="img" size="30">
      <p class="input_item"><span class="item_name">コメント</span></p><textArea id="input_area" name="cmt" rows="4" cols="40"></textArea>
    </div>
      <input type="hidden" name="uid" value="<?=$id ?>">
      <input id="btn2" class="block" type="submit" value="登録">
  </div>
</form>


<!-- Main[End] -->

<?php include("footer.php") ?>
</body>
</html>
