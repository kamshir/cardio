<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

$this->title = 'Регистрация';
?>

<div class="box__reg">
    
    <div class="box__reg__inner">
      <div class="login-content">
        <div class="login__logo">
          <a href="<?= Url::home() ?>">
            <?= Html::img("@web/images/logo_dark.svg") ?>
          </a>
        </div>
        <div class="login__form">
          <h3>Основная информация</h3>
          <?php $form = ActiveForm::begin([
                
            ]); ?>

            <div class="row form-group">
              <div class="col-md-6">
                <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
              </div>

              <div class="col-md-6">
                <?= $form->field($model, 'last_name')->textInput() ?>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-6">
                <?= $form->field($model, 'middle_name')->textInput() ?>
              </div>

              <div class="col-md-6">
                <?= $form->field($model, 'birthday')->widget(DateTimePicker::className(),[
                      'name' => 'birthday',
                      'type' => DateTimePicker::TYPE_INPUT,
                      'options' => ['placeholder' => 'Ввод даты/времени...'],
                      'value'=> date("d.m.Y H:i",(integer) $model->birthday),
                      'pluginOptions' => [
                          'autoclose'=>true,
                          'weekStart'=>1, //неделя начинается с понедельника
                      ]
                  ]); ?>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-6">
                <?= $form->field($model, 'phone')->textInput() ?>
              </div>

              <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput() ?>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-4">
                <?= $form->field($model, 'city')->textInput() ?>
              </div>

              <div class="col-md-4">
                <?= $form->field($model, 'street')->textInput() ?>
              </div>

              <div class="col-md-2">
                <?= $form->field($model, 'num_house')->textInput() ?>
              </div>

              <div class="col-md-2">
                <?= $form->field($model, 'num_appartament')->textInput() ?>
              </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                  <?= $form->field($model, 'rememberMe')->checkbox([
                      'template' => "<div class=\"\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                  ]) ?>
                </div>
                <div class="col-md-12">
                  <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success btn-login', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>

</div>