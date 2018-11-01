<?php
session_start();
include("funcs.php");

//1. GETでid値を取得
$id = $_GET["id"];

//2. DB接続します
$pdo = db_con();

//３．SELECT
if($_SESSION){ 
  $uid = $_SESSION["id"];
}
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

$sql2 = "SELECT * FROM gs_bm_table WHERE name='" . $row["name"]. "' "; 
$stmt2 = $pdo->prepare($sql2);
$status2 = $stmt2->execute();

if($status2==false) {
  sqlError($stmt2);
}else{
  while( $result2 = $stmt2->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p class='cmt_style'>";
    $view .= $result2["cmt"];
    $view .= ' ';
    $view .= "</p>";
  }
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
<?php if($_SESSION){ ?> 
  <?php include("header.php") ?>
<?php }else{ ?>
  <?php include("header_logout.php") ?>
<?php } ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="detail_item">
  <img src="files/<?=$row["img"] ?>">
  <div class="book_info">
    <p>書籍タイトル：<?=$row["name"] ?></p>
    <p>書籍のURL：<a href='<?=$row["url"] ?>'><?=$row["url"] ?></a></p>
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
    <p>コメント：</p>
    <?php echo $view ?>

    <?php if($_SESSION){ ?> 
        <?php if($_SESSION["id"] == $row["uid"]){ ?> 
          <div class="detail_btns">
            <form method="post" action="u_view.php?id=<?=$id ?>">
                <input type="hidden" name="id" value="<?=$id ?>">
                <input id="btn" type="submit" value="編集">
            </form>
            <form method="post" action="delete.php?id=<?=$id ?>">
                <input id="btn" type="submit" value="削除">
            </form>
          </div>  
        <?php } ?>
    <?php }  ?>

    <?php if($_SESSION){ ?> 
        <?php if($_SESSION["id"] != $row["uid"]){ ?> 
          <div class="detail_btns">
            <form method="post" action="bookmark_.php?id=<?=$id ?>">
                <input id="btn" type="submit" value="bookmarkする">
            </form>
          </div>  
        <?php } ?>
    <?php }  ?>

  </div>
</div>

<!-- Main[End] -->

<?php include("footer.php") ?>
</body>
</html>