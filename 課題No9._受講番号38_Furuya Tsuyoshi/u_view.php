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

$biz = "";
$nvl = "";
$cmic = "";
$tec = "";
$other = "";
if($row["biz"] == 1){
  $biz = "checked";
}
if($row["nvl"] == 1){
  $nvl = "checked";
}
if($row["cmic"] == 1){
  $cmic = "checked";
}
if($row["tec"] == 1){
  $tec = "checked";
}
if($row["other"] == 1){
  $other = "checked";
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
      <p>書籍タイトル：<?=$row["name"] ?></p>
      <p>書籍のURL：<a href='<?=$row["url"] ?>'><?=$row["url"] ?></a></p>
      <p class="input_item"><span class="item_name">書籍のimg</span></p>
      <img class="editImg" src="files/<?=$row["img"] ?>"><br/>
      <p class="input_item"><span class="item_name">タグ</span>
        <span><input type="hidden" name="biz" value="0"></span>
        <span><input type="checkbox" name="biz" value="1" <?=$biz ?>>business</span>
        <span><input type="hidden" name="nvl" value="0"></span>
        <span><input type="checkbox" name="nvl" value="1" <?=$nvl ?>>novel</span>
        <span><input type="hidden" name="cmic" value="0"></span>
        <span><input type="checkbox" name="cmic" value="1" <?=$cmic ?>>comic</span>
        <span><input type="hidden" name="tec" value="0"></span>
        <span><input type="checkbox" name="tec" value="1" <?=$tec ?>>tecnology</span>
        <span><input type="hidden" name="other" value="0"></span>
        <span><input type="checkbox" name="other" value="1" <?=$other ?>>other</span>
      </p>
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