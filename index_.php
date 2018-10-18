<?php
include("funcs.php");
$pdo = db_con();

//２．データ登録SQL作成
// $stmt = $pdo->prepare(" SELECT * FROM gs_bm_table ORDER BY id LIMIT ?,5 ");
// $stmt->bindParam(1, $_REQUEST['page'], PDO::PARAM_INT);
// $status = $stmt->execute();

if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}
$start = 10 * ($page - 1);
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY id DESC LIMIT ?,10");
$stmt->bindParam(1, $start, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";

if($status==false) {
  // function sqlError($stmt){
  //   //execute（SQL実行時にエラーがある場合）
  // $error = $stmt->errorInfo();
  // exit("SQL_ERROR:".$error[2]);
  // }
  sqlError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    // $view .= $result["name"].",".$result["url"].",".$result["cmt"]."<br>"; // 「.=」は代入した値を繰り返しで追加してくれる
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
<title>BookMark.do</title>
<link rel="stylesheet" href="css/range.css">
<link rel="stylesheet" href="css/styles.css">
</head>
<body id="main">
<!-- Head[Start] -->
<?php include("header_logout.php") ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="search_area">
    <form method="post" action="search_.php">
      <input id="search_box" name="search">
      <input id="search_btn" type="submit" value="検索">
      <p>
        <span><input type="hidden" name="biz" value="0"></span>
        <span class="src_check"><input type="checkbox" name="biz" value="1" id="biz"><label for="biz">business</label></span>
        <span><input type="hidden" name="nvl" value="0"></span>
        <span class="src_check"><input type="checkbox" name="nvl" value="1" id="nvl"><label for="nvl">novel</label></span>
        <span><input type="hidden" name="cmic" value="0"></span>
        <span class="src_check"><input type="checkbox" name="cmic" value="1" id="cmic"><label for="cmic">comic</label></span>
        <span><input type="hidden" name="tec" value="0"></span>
        <span class="src_check"><input type="checkbox" name="tec" value="1" id="tec"><label for="tec">tecnology</label></span>
        <span><input type="hidden" name="other" value="0"></span>
        <span class="src_check"><input type="checkbox" name="other" value="1" id="other"><label for="other">other</label></span>
      </p>
    </form>
</div>
<div>
    <div class="container bookmarkList">
      <p class="listTitle"><span class="bookNum">Recent Bookmark</span>
      </p>
      <?=$view?>
    </div>
</div>

<span class="pageArea">
  <?php if ($page >= 2): ?>
    <a class="paging" href="index_.php?page=<?= ($page-1); ?>"><?= ($page-1); ?></a>
  <?php endif; ?>
  
  <p class="pagingNow"><?= ($page); ?></p>

  <?php
  $counts = $pdo->query('SELECT COUNT(*) as cnt FROM gs_bm_table');
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
