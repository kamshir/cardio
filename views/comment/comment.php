<?php 
	$db = connect();
	$id = intval($_POST['comment_id']);
	$comment = strip_tags(trim($_POST['comment']));
	$res = $db->query("INSERT INTO `comment`(`id`, `comment`) VALUES ($id, '$comment')");
?>

<?php 
	use app\models\Comment;

	$comments = Comment::find()->where(['id' => $id])->asArray()->all();
	$last = Comment::find()->orderBy(['id_comment' => SORT_DESC])->one();
 ?>

<?php foreach ($comments as $com): ?>
	<div class="col-md-12 doctor__comment <?php if ($com['id_comment'] == $last->id_comment) echo 'new_comment' ?>">
		<div class="col-9 comment__ava">
			<i class="fas fa-user-circle"></i>
			<span>User</span>
			<span class="coment_date">(
				<?php 
					$time = time() - strtotime($com['date']);
					if ($time < 60){
						echo 'менее минуты';
					}
					elseif ($time >= 60 && $time < 3600) {
						$min_time = intval(date('i', $time));
						echo $min_time . ' м.';
					} 
					elseif ($time >= 3600 && $time < 86400){
						$hour_time = floor($time / 60 / 60);
						echo $hour_time . ' ч.';
					} 
					elseif ($time >= 86400) {
						$day_time = date('z', $time);
						echo $day_time;
					}
				 ?>
			)</span>
		</div>
		<div class="col-md-12 comment__body">
			<p><?= $com['comment'] ?></p>
		</div>
	</div>
<?php endforeach ?>