<?php
session_start();

include("funcs.php");
loginCheck();

//2. DB接続します
$pdo = db_con();
// var_dump($_SESSION);

//３．SELECT
$id = $_GET["id"];
$sql = "SELECT * FROM gs_bm_table WHERE id=:id"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ表示
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
  <title>データ登録</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Head[Start] -->
<?php include("header.php") ?>
<!-- Head[End] -->


<!-- Main[Start] -->
<form method="post" action="insert_.php">
  <div class="">
    <div class="view_items">
      <p>書籍タイトル：<?=$row["name"] ?></p>
      <p>書籍のURL：<a href='<?=$row["url"] ?>'><?=$row["url"] ?></a></p>
      <img class="editImg" src="files/<?=$row["img"] ?>"><br/>
      <?php if($row["biz"] == 1){ ?>
        <span class="tag">business</span>
      <?php } ?>
      <?php if($row["nvl"] == 1){ ?>
        <span class="tag">novel</span>
      <?php } ?>
      <?php if($row["cmic"] == 1){ ?>
        <span class="tag">comic</span>
      <?php } ?>
      <?php if($row["tec"] == 1){ ?>
        <span class="tag">tecnology</span>
      <?php } ?>
      <?php if($row["other"] == 1){ ?>
        <span class="tag">other</span>
      <?php } ?>
      <p class="input_item"><span class="item_name">コメント</span></p><textArea id="input_area" name="cmt" rows="4" cols="40"></textArea>
    </div>
      <input type="hidden" name="id" value="<?=$row["id"] ?>">
      <input type="hidden" name="uid" value="<?=$_SESSION["id"] ?>">
      <input id="btn2" class="block" type="submit" value="登録">
  </div>
</form>


<!-- Main[End] -->

<?php include("footer.php") ?>
</body>
</html>
