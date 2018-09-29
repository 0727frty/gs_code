<?php
include("funcs.php");
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
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
    $view .= $result["img"];
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
<?php include("header.php") ?>
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
      <p class="listTitle">BookMark<span class="bookNum">(<?php echo $stmt->rowCount()."冊" ?></span>)
      </p>
      <?=$view?>
    </div>
</div>
<!-- Main[End] -->
<?php include("footer.php") ?>
</body>
</html>
