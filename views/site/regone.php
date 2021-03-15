<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

$this->title = 'Регистрация - 1 этап';
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
          <h3>Пользовательская информация</h3>
          <?php $form = ActiveForm::begin([
                
            ]); ?>

            <div class="row form-group">
              <div class="col-md-12">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
              </div>

              <div class="col-md-12">
                <?= $form->field($model, 'password')->passwordInput() ?>
              </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                  <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success btn-login', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
            <a href="<?= Url::to("/login") ?>">Войти</a>
        </div>
      </div>
    </div>

</div>