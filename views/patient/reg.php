<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'Регистрация';
?>
<div class="patient-create">
	
	<div class="container">
		<div class="container" id="content">
			
		</div>
	</div>

</div>

<div class="box__login">
    
    <div class="box__login__inner">
      <div class="login-content">
        <div class="login__logo">
          <a href="<?= Url::home() ?>">
            <?= Html::img("@web/images/logo_dark.svg") ?>
          </a>
        </div>
        <div class="login__form">
          <h1><?= Html::encode($this->title) ?></h1>
			<?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
        </div>
      </div>
    </div>

</div>