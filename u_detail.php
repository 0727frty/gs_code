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
  <title>データ詳細</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Head[Start] -->
<?php include("header.php") ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="detail_item">
  <img src="files/<?=$row["img"] ?>">
  <div class="book_info">
    <p>書籍タイトル：<?=$row["name"] ?></p>
    <p>書籍のURL：<a href='<?=$row["url"] ?>'><?=$row["url"] ?></a></p>
    <p>コメント：<?=$row["cmt"] ?></p>
    <div class="detail_btns">
      <form method="post" action="u_view.php?id=<?=$id ?>">
          <input type="hidden" name="id" value="<?=$id ?>">
          <input id="btn" type="submit" value="編集">
      </form>
      <form method="post" action="delete.php?id=<?=$id ?>">
          <input id="btn" type="submit" value="削除">
      </form>
    </div>
  </div>
</div>

<!-- Main[End] -->

<?php include("footer.php") ?>
</body>
</html>