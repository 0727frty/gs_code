<?php

ini_set('display_errors', 1);
define('MAX_FILE_SIZE', 1 * 1024 * 1024); // 1MB
define('THUMBNAIL_WIDTH', 400);
define('IMAGES_DIR', __DIR__ . '/images');
define('THUMBNAIL_DIR', __DIR__ . '/thumbs');

if (!function_exists('imagecreatetruecolor')) {
  echo 'GD not installed';
  exit;
}

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

require 'ImageUploader3.php';

$uploader = new \MyApp\ImageUploader();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $uploader->upload();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Head[Start] -->
<?php include("header.php") ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="">
    <div class="view_items">
      <p class="input_item"><span class="item_name">書籍タイトル</span></p><input id="input_box" type="text" name="name">
      <p class="input_item"><span class="item_name">書籍のURL</span></p><input id="input_box" type="text" name="url">
      <p class="input_item"><span class="item_name">書籍のimg</span></p><input id="input_box" type="text" name="img">
      <!-- <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo h(MAX_FILE_SIZE); ?>">
        <input type="file" name="img">
        <input type="submit" value="upload">
      </form> -->
      <p class="input_item"><span class="item_name">コメント</span></p><textArea id="input_area" name="cmt" rows="4" cols="40"></textArea>
    </div>
      <input id="btn2" class="block" type="submit" value="登録">
  </div>
</form>



<!-- Main[End] -->

<?php include("footer.php") ?>
</body>
</html>
