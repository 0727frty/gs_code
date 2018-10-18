<?php
session_start();
include("funcs.php");
loginCheck();
$pdo = db_con();

// var_dump($_SESSION);

//２．データ登録SQL作成
$name = $_SESSION["name"];
$uid = $_SESSION["id"];
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$stmt->bindValue(':uid', $uid, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$view="";

if($status==false) {
  sqlError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<p class="user_rows">';
    $view .= $result["id"].". ";
    $view .= '<span class="user_items">';
    $view .= $result["name"];
    $view .= "</span>";
    $view .= '<span class="user_items">';
    $view .= "権限：";
    $view .= $result["kanri_flg"];
    $view .= "</span>";
    $view .= '<a class="user_items user_edits" href="userEdit.php?id='.$result["id"].'">';
    $view .= '編集';
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
<title>BookMark.do</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body id="main">
<!-- Head[Start] -->
<?php if($_SESSION["kanri_flg"]=="1"){ ?> 
  <?php include("admin.php") ?>
<?php } ?>

<?php include("header.php") ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="">
      <?=$view?>
    </div>
</div>
<!-- Main[End] -->
<?php include("footer.php") ?>
</body>
</html>
