<?php
//1. POSTデータ取得
$search = $_POST["search"];

//2. DB接続します
include("funcs.php");
$pdo = db_con();

//３．SELECT
$sql ="SELECT * FROM gs_bm_table WHERE name Like '%$search%' or cmt Like '%$search%'"; 
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':search', $search, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
$view="";
if($status==false){
  sqlError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p>";
    $view .= '<a href="u_view.php?id='.$result["id"].'">';
    $view .= $result["indate"]." ： ".$result["name"];
    $view .= '</a>';
    $view .= ' ';
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= '［削除］';
    $view .= '</a>';
    $view .= "</p>";
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
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->
<?php include("footer.php") ?>
</body>
</html>
