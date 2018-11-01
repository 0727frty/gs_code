<?php
session_start();
include("funcs.php");
loginCheck();
$pdo = db_con();

if (empty($_REQUEST['id'])) {
	header('Location: index.php');
	exit();
}

// 投稿を取得する
$posts = $pdo->prepare('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id AND p.id=? ORDER BY p.created DESC');
$posts->execute(array($_REQUEST['id']));


$sql = "SELECT m.name, m.picture, p.* FROM members m, posts p WHERE reply_post_id=:reply_post_id AND (m.id=p.member_id)";
$res_posts = $pdo->prepare($sql);
$res_posts->bindValue(':reply_post_id', $_REQUEST['id'], PDO::PARAM_INT);
$res_status = $res_posts->execute();

$view="";

if($res_status==false) {
  sqlError($res_posts);
}else{
  while( $result = $res_posts->fetch(PDO::FETCH_ASSOC)){ 
	$view .= '<div class="msg">';
	$view .= '<img class="postImg_view" src="member_picture/'.$result["picture"].'" ?>';
	$view .= "<span class='name'>";
	$view .= $result["name"];
	$view .= "</span>";
	$view .= "<p class='msg_row'>";
	$view .= "<span class='msg_content'>";
	$view .= $result["message"];
	$view .= "</span>";
	$view .= "</p>";
	$view .= "<p class='day'>";
	$view .= "<span class='small'>";
	$view .= $result["created"];
	$view .= "</span>";
	$view .= "</p>";
    $view .= "</div>";
  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Memory</title>
	<link rel="stylesheet" href="/msg/css/style.css" />
</head>

<body>
	<div id="wrap">
	<?php include("header.php") ?>
		<div id="content">
			<p>&laquo;<a href="post.php">一覧にもどる</a></p>

			<?php
			if ($post = $posts->fetch()):
				?>
				<div class="msg">
					<img class="postImg_view" src="member_picture/<?php echo h($post['picture'], ENT_QUOTES); ?>"  alt="<?php echo h($post['name'], ENT_QUOTES); ?>" />
					<span class="name"><?php echo h($post['name'], ENT_QUOTES); ?></span>
					<p class="msg_row"><span class="msg_content"><?php echo h($post['message'], ENT_QUOTES);
					?></span></p>
					<p class="day"><span class="small"><?php echo h($post['created'], ENT_QUOTES); ?></span></p>
				</div>
				<?=$view?>
				<?php
			else:
				?>
				<p>その投稿は削除されたか、URLが間違えています</p>
				<?php
			endif;
			?>
		</div>
	</div>
</body>
</html>
