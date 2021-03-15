<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Отделения';
$depts = department();
?>

<div class="banner" style="background-image: url(<?= Url::to("@web/images/departments.jpg"); ?>);">
	<div class="banner__inner">
		<div class="banner__title">
			<?= Html::encode($this->title) ?> <span>Cardio</span>
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
   <div class="colorlib-departments">
      <div class="container">
         <div class="row">
            <?php for($i = 0; $i < count($depts); $i++): ?>
               <div class="department-wrap animate-box">
                  <div class="grid-1 col-md-6 <?php if($i % 2 == 0) echo 'col-md-push-6' ?>" style="background-image: url(<?= $depts[$i]->getImage()->getUrl() ?>);"></div>
                  <div class="grid-2 col-md-6 <?php if($i % 2 == 0) echo 'col-md-pull-6' ?>">
                     <div class="desc">
                        <h2><a href="<?= Url::to('/department/' . $depts[$i]->id) ?>"><?= $depts[$i]->title ?></a></h2>
                        <p><?= $depts[$i]->description ?></p>
                        <div class="department-info">
                           <div class="block">
                              <h2><a href="doctors-single.html">Кто главный?</a></h2>
                              <span>Head Department</span>
                           </div>
                           <div class="block">
                              <h2><a href="departments-single.html">Где находится?</a></h2>
                              <span>Блок А, на третьем этаже</span>
                           </div>
                           <div class="block">
                              <h2><a href="doctors.html">Найти специалиста</a></h2>
                              <span>Обратитесь в регистратуру</span>
                           </div>
                           <div class="block">
                              <h2><a href="appointment.html">Запись на приём</a></h2>
                              <span>Заполните форму, чтобы записаться на приём к врачу</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endfor;?>
         </div>
      </div>
   </div>
</div>