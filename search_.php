<?php
//1. POSTデータ取得
$search = $_POST["search"];
$biz = $_POST["biz"];
$nvl = $_POST["nvl"];
$cmic = $_POST["cmic"];
$tec = $_POST["tec"];
$other = $_POST["other"];

//2. DB接続します
include("funcs.php");
$pdo = db_con();

// var_dump($_SESSION);

//３．SELECT
// $sql ="SELECT * FROM gs_bm_table WHERE name Like '%$search%' OR cmt Like '%$search%'";
// $sql ="SELECT * FROM gs_bm_table WHERE (biz=$biz AND nvl=$nvl AND cmic=$cmic AND tec=$tec AND other=$other) AND (name Like '%$search%' OR cmt Like '%$search%')"; 
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':search', $search, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $status = $stmt->execute();

if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
  $page = $_REQUEST['page'];
} else {
  $page = 1;
}
$start = 10 * ($page - 1);
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE (biz=$biz AND nvl=$nvl AND cmic=$cmic AND tec=$tec AND other=$other) AND (name Like '%$search%' OR cmt Like '%$search%') ORDER BY id DESC LIMIT ?,10");
$stmt->bindParam(1, $start, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
$view="";
if($status==false){
  sqlError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<div class="bookArea">';
    $view .= "<p>";
    $view .= '<a href="u_detail.php?id='.$result["id"].'">';
    $view .= $result["name"];
    $view .= '</a>';
    $view .= ' ';
    $view .= "</p>";
    $view .= '<a href="u_detail.php?id='.$result["id"].'"><img class="bookImg" src="files/'.$result["img"].'"></a>';
    $view .= "</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>検索結果</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body id="main">
<!-- Head[Start] -->
<?php include("header_logout.php") ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="search_area">
    <form method="post" action="search_.php">
      <input id="search_box" name="search" value="<?php echo $search ?>">
      <input id="search_btn" type="submit" value="検索">
    </form>
</div>
<div>
    <div class="container bookmarkList">
      <p class="listTitle">検索結果<span class="bookNum">(<?php echo $stmt->rowCount()."冊" ?></span>)
      </p>
      <?= $view ?>
    </div>
</div>

<span class="pageArea">
  <?php if ($page >= 2): ?>
    <a class="paging" href="index_.php?page=<?= ($page-1); ?>"><?= ($page-1); ?></a>
  <?php endif; ?>
  
  <p class="pagingNow"><?= ($page); ?></p>

  <?php
  $counts = $pdo->query("SELECT COUNT(*) as cnt FROM gs_bm_table WHERE (biz=$biz AND nvl=$nvl AND cmic=$cmic AND tec=$tec AND other=$other) AND (name Like '%$search%' OR cmt Like '%$search%')");
  $count = $counts->fetch();
  $max_page = floor($count['cnt'] / 10) + 1;
  if ($page < $max_page):
  ?>
    <a class="paging" href="index_.php?page=<?= ($page+1); ?>"><?= ($page+1); ?></a>
  <?php endif; ?>
</span>

<!-- Main[End] -->
<?php include("footer.php") ?>
</body>
</html>
