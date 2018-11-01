<?php
include("funcs.php");
$pdo = db_con();

// var_dump($_SESSION);

//２．データ登録SQL作成
// $stmt = $pdo->prepare(" SELECT * FROM gs_bm_table ORDER BY id LIMIT ?,5 ");
// $stmt->bindParam(1, $_REQUEST['page'], PDO::PARAM_INT);
// $status = $stmt->execute();

if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}
$start = 5 * ($page - 1);
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY id LIMIT ?,5");
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
<header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <h1 class="navbar-header">
          <a class="navbar-brand" href="index_.php">BookMark.do</a>
        </h1>
        <a class="none" href="login.php">ログイン</a>
      </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="search_area">
    <form method="post" action="search.php">
      <input id="search_box" name="search">
      <input id="search_btn" type="submit" value="検索">
    </form>
</div>
<div>
    <div class="container bookmarkList">
      <p class="listTitle"><span class="bookNum">Recent Bookmark</span>
      </p>
      <?=$view?>
    </div>
</div>

<?php if ($page >= 2): ?>
  <a href="test.php?page=<?php print($page-1); ?>"><?php print($page-1); ?>ページ目へ</a>
<?php endif; ?>
|
<?php
$counts = $pdo->query('SELECT COUNT(*) as cnt FROM gs_bm_table');
$count = $counts->fetch();
$max_page = floor($count['cnt'] / 5) + 1;
if ($page < $max_page):
?>
  <a href="test.php?page=<?php print($page+1); ?>"><?php print($page+1); ?>ページ目へ</a>
<?php endif; ?>

<!-- Main[End] -->
<?php include("footer.php") ?>
</body>
</html>
