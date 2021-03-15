<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход на сайт';
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
          <?php $form = ActiveForm::begin([
                
            ]); ?>

                <?= $form->field($model, 'username')->textInput() ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                ]) ?>

                <?= Html::submitButton('Войти', ['class' => 'btn btn-success btn-login', 'name' => 'login-button']) ?>

            <?php ActiveForm::end(); ?>
            <a href="<?= Url::to("/site/regone") ?>">Зарегистрироваться</a>
        </div>
      </div>
    </div>

</div>