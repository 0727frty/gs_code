<?php
//1. GETでid値を取得
$id = $_GET["id"];

//2. DB接続します
include("funcs.php");
$pdo = db_con();

//３．SELECT
$sql = "SELECT * FROM gs_bm_table WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//４．データ表示
$view="";
if($status==false) {
  // function sqlError($stmt){
  //   //execute（SQL実行時にエラーがある場合）
  // $error = $stmt->errorInfo();
  // exit("SQL_ERROR:".$error[2]);
  // }
  sqlError($stmt);

}else{
    $row = $stmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Head[Start] -->
<?php include("header.php") ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php" enctype="multipart/form-data">
  <div class="">
    <div class="view_items">
      <p class="input_item"><span class="item_name">書籍タイトル</span></p><input id="input_box" type="text" name="name" value="<?=$row["name"] ?>">
      <p class="input_item"><span class="item_name">書籍のURL</span></p><input id="input_box" type="text" name="url" value="<?=$row["url"] ?>">
      <p class="input_item"><span class="item_name">書籍のimg</span></p>
      <p class="edit_fileName">設定中の画像：<?=$row["img"] ?></p>
      <img class="editImg" src="files/<?=$row["img"] ?>"><br/>
      <input type="file" name="img" size="30">
      <p class="input_item"><span class="item_name">コメント</span></p><textArea id="input_area" name="cmt" rows="4" cols="40"><?=$row["cmt"] ?></textArea>
    </div>
      <input type="hidden" name="id" value="<?=$row["id"] ?>">
      <input id="btn2" class="block" type="submit" value="更新">
  </div>
</form>
<!-- Main[End] -->

<?php include("footer.php") ?>
</body>
</html>