<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Прейскурант';
?>

<div class="banner" style="background-image: url(<?= Url::to("@web/images/prices.jpg"); ?>);">
	<div class="banner__inner">
		<div class="banner__title">
			<?= $this->title ?>
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
               <h2><span>Цены</span> на услуги</h2>
            </div>
         </div>
         <div class="row animate-box">
            <?php $len = count($prices) / 2; ?>
            <div class="col-md-6">
               <ul class="plan">
                  <?php for ($i = 0; $i < $len; $i++): ?>
                    <a href="<?= Url::to("/service/" . $prices[$i]->id) ?>"><li><?= $prices[$i]->title ?><span><mark><?= $prices[$i]->price ?></mark></span></li></a>
                  <?php endfor; ?>
               </ul>
            </div>
            <div class="col-md-6">
               <ul class="plan">
                  <?php for (; $i < count($prices); $i++): ?>
                    <a href="<?= Url::to("/service/" . $prices[$i]->id) ?>"><li><?= $prices[$i]->title ?><span><mark><?= $prices[$i]->price ?></mark></span></li></a>
                  <?php endfor; ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>