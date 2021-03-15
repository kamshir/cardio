<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'FAQ';
?>

<div class="banner" style="background-image: url(images/dispatcher-7.webp);">
	<div class="banner__inner">
		<div class="banner__title">
			Часто задаваемые вопросы
		</div>
		<div class="banner__divide"></div>
		<div class="banner__text">
			Мы готовы ответить, на любые Ваши вопросы
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

	<div class="questions">
		<div class="questions__inner">
			<hr class="q_div">
			<div class="question">
				<a href="#quest" class="quest" data-id="quest">
					<span class="question__title">
						КАК РАБОТАЕТ НОВЫЙ ПОРЯДОК ПРИЕМА ПАЦИЕНТОВ?
					</span>
				</a>
				<div class="question__answer">
					Напишите ответ здесь. Пишите кратко и понятно, приведите примеры, загрузите для наглядности изображения или видео. Перечитайте написанное, чтобы убедиться, что информация будет понятна тем, кто заходит на ваш сайт впервые.
				</div>
			</div>
			<hr class="q_div">
			<div class="question">
				<a href="#quest" class="quest" data-id="quest">
					<span class="question__title">
						КАКОЕ КОЛИЧЕСТВО ПАЦИЕНТОВ ОБСЛУЖИВАЕТ «Cardio»?
					</span>
				</a>
				<div class="question__answer">
					В среднем, от 300 посетителей в день
				</div>
			</div>
			<hr class="q_div">
			<div class="question">
				<a href="#quest" class="quest" data-id="quest">
					<span class="question__title">
						ВЫ ПРЕДОСТАВЛЯЕТЕ БЕСПЛАТНЫЕ КОНСУЛЬТАЦИИ?
					</span>
				</a>
				<div class="question__answer">
					Да, вы можете связаться с одним из наших врачей, и он назначит вам время для личной консультации
				</div>
			</div>
			<hr class="q_div">
		</div>
	</div>

</div>
