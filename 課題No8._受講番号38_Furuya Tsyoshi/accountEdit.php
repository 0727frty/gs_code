<?php
session_start();

include("funcs.php");
loginCheck();
$pdo = db_con();

//３．SELECT
$id = $_SESSION["id"];
$sql = "SELECT * FROM gs_user_table WHERE id=:id"; 
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
  <title>アカウント情報</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <h1 class="navbar-header">
          <a class="navbar-brand" href="index.php">BookMark.do</a>
        </h1>
      </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="accountEdit_act.php">
    <div class="container">
        <p class="itemTitle">アカウント情報</p>

        <div class="form_items">
            <p class="right"><span class="item_name">名前：</span><input id="input_form" type="text" name="name" value="<?=$row["name"] ?>"></p>
            <p class="right"><span class="item_name">ID：</span><input id="input_form" type="text" name="lid" value="<?=$row["lid"] ?>"></p>
            <p class="right"><span class="item_name">PASSWORD：</span><input id="input_form" type="text" name="lpw" value="<?=$row["lpw"] ?>"></p>
        </div>
        
        <input id="btn2" class="block" type="submit" value="更新する">
    </div>

    <div class="center">
      <a href="resign.php">退会する</a>
    </div>
</form>


<!-- Main[End] -->

<?php include("footer.php") ?>
</body>
</html>
