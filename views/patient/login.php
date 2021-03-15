<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
?>

<div class="box__login">
    
    <div class="box__login__inner">
      <div class="login-content">
        <div class="login__logo">
          <a href="<?= Url::home() ?>">
            <?= Html::img("@web/images/logo_dark.svg") ?>
          </a>
        </div>
        <div class="login__form">
        	<?php Yii::$app->session['patient']->isActive ?>
          <?php $form = ActiveForm::begin([
                
            ]); ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                <div class="form-group">
				        <?= Html::submitButton('Войти', ['class' => 'btn btn-success btn-login', 'id' => 'patient_login']) ?>
				    </div>

            <?php ActiveForm::end(); ?>
            <div class="text-center"><a href="/patient/reg">Регистрация</a></div>
        </div>
      </div>
    </div>

</div>