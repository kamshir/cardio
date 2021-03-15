<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $dep->title;
$img = $dep->getImage();
?>

<div class="banner" style="background-image: url(<?= $img->getUrl('x1000') ?>);">
	<div class="banner__inner">
		<div class="banner__title">
			<?= $dep->title ?>
		</div>
		<div class="banner__divide"></div>
		<div class="banner__text">
			<?= $dep->description ?>
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
   <div class="colorlib-pricing">
      <div class="container">
         <div class="row animate-box">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
               <h2><span>Услуги</span> отделения</h2>
               <p>A small river named Duden flows by their place and supplies it with the necessary regelialia</p>
            </div>
         </div>
         <div class="row animate-box">
            <?php $len = count($dep->services) / 2; ?>
            <div class="col-md-6">
               <ul class="plan">
                  <!-- Первая половина -->
                  <?php for ($i = 0; $i < $len; $i++): ?>
                    <a href="<?= Url::to("/service/" . $dep->services[$i]->id) ?>"><li><?= $dep->services[$i]->title ?><span><mark><?= $dep->services[$i]->price ?></mark></span></li></a>
                  <?php endfor; ?>
               </ul>
            </div>
            <div class="col-md-6">
               <ul class="plan">
                  <!-- Вторая половина -->
                  <?php for (; $i < count($dep->services); $i++): ?>
                    <a href="<?= Url::to("/service/" . $dep->services[$i]->id) ?>"><li><?= $dep->services[$i]->title ?><span><mark><?= $dep->services[$i]->price ?></mark></span></li></a>
                  <?php endfor; ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>