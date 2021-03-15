<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Врачи';
?>

<div class="banner" style="background-image: url(<?= Url::to("@web/images/doctors.jpg"); ?>);">
	<div class="banner__inner">
		<div class="banner__title">
			Врачи мед центра "Cardio"
		</div>
		<div class="banner__divide"></div>
		<div class="banner__text">
			Врачи высшей квалификационной категории, кандидаты медицинских наук
		</div>	
	</div>
	<a class="banner__flag" href="#content"><i class="glyphicon glyphicon glyphicon-menu-down
		"></i></a>
</div>

<div id="colorlib-appointment">
   <div class="container">
       <div class="row">
           <div class="col-md-8 col-md-offset-2 text-center">
               <h2 class="line-block">Записаться на приём</h2>
               <p class="line-block"><a href="<?= Url::to("/appointment") ?>" class="btn btn-primary btn-outline btn-cta">Записаться <i class="fas fa-calendar-alt"></i></a></p>
           </div>
       </div>
   </div>
</div>

<div class="container" id="content">
	<div class="doctors">
		<div class="doctors__inner">
			<h1>Руководство</h1>
			<div class="doctors__management">
				<?php foreach ($doctors as $doctor): ?>
					<?php if ($doctor->status): ?>
						<?php $img = $doctor->getImage()->getUrl() ?>
						<div class="doctor__manager">
							<div class="doctor__image">
								<?= Html::img($img, ['alt'=>'doctor', 'class'=>'doctor__image-img']) ?>
							</div>
							<div class="doctor__name">
								<a href="<?= Url::to("/doctor/$doctor->id") ?>" class="text-uppercase"><?= $doctor->last_name . ' ' . mb_substr($doctor->first_name, 0, 1) . '.' . mb_substr($doctor->middle_name, 0, 1) ?></a>
							</div>
							<div class="doctor__divide"></div>
							<div class="doctor__spec">
								<?= $doctor->speciality->title ?>
							</div>
							<div class="doctor__feature"></div>
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>

			<h1>Врачи</h1>
			<div class="doctors__personal">
				<?php foreach ($doctors as $doctor): ?>
					<?php if (!$doctor->status): ?>
						<?php $img = $doctor->getImage()->getUrl() ?>
						<div class="doctor__manager">
							<div class="doctor__image">
								<?= Html::img($img, ['alt'=>'doctor', 'class'=>'doctor__image-img']) ?>
							</div>
							<div class="doctor__name">
								<a href="<?= Url::to("/doctor/$doctor->id") ?>" class="text-uppercase"><?= $doctor->last_name . ' ' . mb_substr($doctor->first_name, 0, 1) . '.' . mb_substr($doctor->middle_name, 0, 1) ?></a>
							</div>
							<div class="doctor__divide"></div>
							<div class="doctor__spec">
								<?= $doctor->speciality->title ?>
							</div>
							<div class="doctor__feature"></div>
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
