<?php 
	use yii\helpers\Html;
	use yii\helpers\Url;

	$this->title = $service->title;
	$img = $service->getImage()->getUrl();
 ?>

<div class="container" id="content">
	<div class="row">
		<div class="col-md-6">
			<img class="service_width" src="<?= $img ?>" alt="<?= $service->title  ?>">
		</div>
		<div class="col-md-6">
			<h1><?= $service->title ?></h1>
			<p>Цена: <?= $service->price ?></p>
			<div class="row">
				<div class="col-md-12">
					<p class="btn-big"><a href="<?= Url::to('/appointment') ?>" class="btn btn-primary">Записаться на приём</a></p>
				</div>
			</div>
		</div>
	</div>
</div>