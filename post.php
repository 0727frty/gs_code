<?php
session_start();
include("funcs.php");
loginCheck();
$pdo = db_con();

// var_dump($_REQUEST);
// exit();

$id = $_SESSION["id"];

$stmt = $pdo->prepare("SELECT * FROM members WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false) {
	sqlError($stmt);
}else{
	$row = $stmt->fetch();
}

// 投稿を取得する
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}
$page = max($page, 1);

// 最終ページを取得する
$counts = $pdo->query('SELECT COUNT(*) AS cnt FROM posts');
$cnt = $counts->fetch();
$maxPage = ceil($cnt['cnt'] / 5);
$page = min($page, $maxPage);

$start = ($page - 1) * 5;
$start = max(0, $start);

$posts = $pdo->prepare('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id ORDER BY p.created DESC LIMIT ?, 5');
$posts->bindParam(1, $start, PDO::PARAM_INT);
$posts->execute();

$message= '';
if (!empty($_POST)) {
	if ($_POST['message'] != '') {
		$sql ="INSERT INTO posts(member_id,message,reply_post_id,created)VALUES(:member_id,:message,:reply_post_id,sysdate())"; 
		$message = $pdo->prepare($sql);
		$message->bindValue(':member_id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
		$message->bindValue(':message', $_POST['message'], PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
		$message->bindValue(':reply_post_id', $_POST['reply_post_id'], PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
		$status2 = $message->execute();

		header('Location: post.php'); 
		exit();
	}
}

// $posts = $pdo->query('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id ORDER BY p.created DESC');


if (isset($_REQUEST['res'])) {
	$response = $pdo->prepare('SELECT m.name, m.picture, p.* FROM members m,posts p WHERE m.id=p.member_id AND p.id=? ORDER BY p.created DESC');
		$response->execute(array($_REQUEST['res']));
		$table = $response->fetch();
		$message = '@' . $table['name'] . ' ' . $table['message'];
		// $res_name = '@' . $table['name'];
		// $message = $table['message'];
	}

function makeLink($value) {
	return mb_ereg_replace("(https?)(://[[:alnum:]\+\$\;\?\.%,!#~*/:@&=_-]+)",'<a href="\1\2">\1\2</a>' , $value);
}

// var_dump($_REQUEST);
// exit();

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
		<form action="post.php" method="post" class="postArea">
		<dl>
			<dt><?php echo $row["name"] ?>さん、メッセージをどうぞ</dt>
		<dd>
		<textarea name="message" cols="50" rows="5"><?php if($_REQUEST){ ?><?php echo $message?><?php } ?></textarea>
		<input type="hidden" name="reply_post_id" value="<?php echo h($_REQUEST['res'], ENT_QUOTES);?>">
		</dd>
		</dl>
		<div>
		<input id="btn" type="submit" value="投稿する" />
		</div>
		</form>
		<?php foreach ($posts as $post): ?>
		<div class="msg">
			<img class="postImg" src="member_picture/<?php echo h($post['picture'], ENT_QUOTES); ?>" alt="<?php echo h($post['name'], ENT_QUOTES); ?>" />
			<span class="name"><?php echo h($post['name'], ENT_QUOTES); ?></span>
			<p class="msg_row"><span class="msg_content"><?php echo makeLink(h($post['message'], ENT_QUOTES));?></span>
			[<a class="msg_res" href="post.php?res=<?php echo h($post['id'], ENT_QUOTES);?>">返信</a>]
			</p>
			<p class="day"><a href="view.php?id=<?php echo h($post['id'], ENT_QUOTES); ?>"><?php echo h($post['created'], ENT_QUOTES); ?></a>
			<?php if($post['reply_post_id'] > 0):?>
				<a href="view.php?id=<?php echo h($post['reply_post_id'], ENT_QUOTES); ?>">返信元のメッセージ</a>
			<?php endif; ?>
			<?php if($_SESSION['id'] == $post['member_id']):?>
				[<a href="delete.php?id=<?php echo h($post['id'], ENT_QUOTES); ?>" style="color:#F33;">削除</a>]
			<?php endif; ?>
			</p>
		</div>
		<?php endforeach; ?>

		<ul class="paging">
			<?php if ($page > 1) { ?>
			<li><a href="post.php?page=<?php print($page - 1); ?>">前のページへ</a></li>
			<?php } else { ?>
			<li>前のページへ</li>
			<?php } ?>
			<?php if ($page < $maxPage) { ?>
			<li><a href="post.php?page=<?php print($page + 1); ?>">次のページへ</a></li>
			<?php } else { ?>
			<li>次のページへ</li>
			<?php } ?>
		</ul>
  </div>

</div>
</body>
</html>
