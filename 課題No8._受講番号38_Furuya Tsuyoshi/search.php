<?php
session_start();
//1. POSTデータ取得
$search = $_POST["search"];

//2. DB接続します
include("funcs.php");
loginCheck();
$pdo = db_con();

var_dump($_SESSION);

//３．SELECT
$uid = $_SESSION["id"];
$sql ="SELECT * FROM gs_bm_table WHERE uid=$uid AND name Like '%$search%' OR cmt Like '%$search%'"; 
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':search', $search, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
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
<title>フリーアンケート表示</title>
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
      <p class="listTitle">検索結果<span class="bookNum">(<?php echo $stmt->rowCount()."冊" ?></span>)
      </p>
      <?= $view ?>
    </div>
</div>
<!-- Main[End] -->
<?php include("footer.php") ?>
</body>
</html>
