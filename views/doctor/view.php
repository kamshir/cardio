<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = $doctor->last_name . ' ' . mb_substr($doctor->first_name, 0, 1) . '.' . mb_substr($doctor->middle_name, 0, 1);
?>

<div id="colorlib-doctor">
	<div class="container">
		<div class="row">
			<div class="col-md-8 image-content">
				<div class="doctor animate-box">
					<?php $img = $doctor->getImage()->getUrl('x500'); ?>
					<?= Html::img($img, ['alt' => $doctor->last_name . ' ' . mb_substr($doctor->first_name, 0, 1) . '.' . mb_substr($doctor->middle_name, 0, 1), 'class' => 'img-responsive doc-img']) ?>
					<h2><?= $doctor->last_name . ' ' . $doctor->first_name . ' ' . $doctor->middle_name ?></h2>
					<span><?= $doctor->speciality->title ?></span>
					<div class="desc2">
						<?php if ($doctor->quotes): ?>
							<blockquote>
								<p><em><?= $doctor->quotes ?></em></p>
							</blockquote>
						<?php endif ?>
						<h3>Биография</h3>
						<p><?= $doctor->description ?></p><br>
							<h3>Подпишись</h3>
							<ul class="colorlib-social">
								<?php foreach ($doctor->social as $soc): ?>
									<?php if ($soc->vk !== ''): ?>
										<li><a class="soc_icon" href="<?= $soc->vk ?>"><i class="fab fa-vk"></i></a></li>
									<?php endif ?>
									<?php if ($soc->instagram !== ''): ?>
										<li><a class="soc_icon" href="<?= $soc->instagram ?>"><i class="fab fa-instagram"></i></a></li>
									<?php endif ?>
									<?php if ($soc->telegram !== ''): ?>
										<li><a class="soc_icon" href="<?= $soc->telegram ?>"><i class="fab fa-telegram"></i></a></li>
									<?php endif ?>
									<?php if ($soc->twitter !== ''): ?>
										<li><a class="soc_icon" href="<?= $soc->twitter ?>"><i class="fab fa-twitter"></i></a></li>
									<?php endif ?>
								<?php endforeach ?>
							</ul>
					</div>
					<?php if ($doctor->email || $doctor->phone): ?>
						<div class="contact-info">
							<h2>Контакты</h2>
							<?php if ($doctor->email): ?>
								<p><i class="far fa-envelope"></i> <?= $doctor->email ?></p>
							<?php endif ?>
							<?php if ($doctor->phone): ?>
								<p><i class="fas fa-phone-alt"></i> <?= $doctor->phone ?></p>
							<?php endif ?>
						</div>
					<?php endif ?>
				</div>
			</div>
			<div class="col-md-4 sticky-parent">
				<div id="sticky_item">
					<h3>График</h3>
					<?php foreach ($doctor->working as $work): ?>
						<div class="schedule">
							<span class="icon"><i class="glyphicon glyphicon-calendar"></i></span>
							<div class="desc">
								<span><?= $work->day ?></span>
								<span><?= date('H:i', strtotime($work->work_from)) ?> - <?= date('H:i', strtotime($work->work_to)) ?></span>
							</div>
						</div>
					<?php endforeach ?>
					<p class="btn-big"><a href="<?= Url::to('/appointment') ?>" class="btn btn-primary">Записаться на приём</a></p>
				</div>
			</div>
		</div>
		<!-- Оставлять комментарии к врачам -->
		<div class="row">
			<div class="col-md-8 doctor_comments">
				<h3>Комментарии</h3>
				<div class="comments__inner">
					<?php if (count($comments) === 0): ?>
						<p>Нет комментариев! Оставьте первым!</p>
					<?php endif ?>
						<?php foreach ($comments as $com): ?>
							<div class="col-md-12 doctor__comment">
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
												echo $day_time . ' д.';
											}
										 ?>
									)</span>
								</div>
								<div class="col-md-12 comment__body">
									<?= $com['comment'] ?>
								</div>
							</div>
						<?php endforeach ?>
				</div>
			</div>
			<!-- Оставить комментарий -->
			<div class="col-md-8 make__comment">
				<h4>Оставить комментарий</h4>
				<?php $form = ActiveForm::begin(); ?>

					<div class="col-md-8">
						<?= $form->field($model, 'comment', ['errorOptions' => ['tag' => null]])->textarea(['maxlength' => true, 'class' => 'form-control comment', 'rows' => 5, 'placeholder' => 'Напишите, как ваши впечатления об этом враче'])->label(false) ?>
					</div>

					<?= $form->field($model, 'id')->input('hidden', ['value' => intval($doctor->id)])->label(false) ?>

					<div class="col-md-12">
						<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary send_comment', 'name' => 'contact-button']) ?>
					</div>

				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>