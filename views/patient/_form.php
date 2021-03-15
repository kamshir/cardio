<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */
/* @var $form yii\widgets\ActiveForm */
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

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            <?php 
                if($model->birthday) {
                    $model->birthday = date("d.m.Y H:i", (integer) $model->birthday);
                }    
                echo $form->field($model, 'birthday')->widget(DateTimePicker::className(),[
                    'name' => 'date_appointment',
                    'type' => DateTimePicker::TYPE_INPUT,
                    'options' => ['placeholder' => 'Ввод даты/времени...'],
                    'value'=> date("d.m.Y H:i",(integer) $model->birthday),
                    'pluginOptions' => [
                        'format' => 'dd.mm.yyyy H:i',
                        'autoclose'=>true,
                        'weekStart'=>1, //неделя начинается с понедельника
                        'todayHighlight'=>true, //снизу кнопка "сегодня",
                        'todayBtn' => true,
                    ]
                ]); ?>

            <?= $form->field($model, 'image')->fileInput() ?>

            <?= $form->field($model, 'phone')->input('phone',['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->input('email' ,['maxlength' => true]) ?>

            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'num_house')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'num_appartament')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="text-center"><a href="/patient/login">Войти</a></div>
        </div>
      </div>
    </div>

</div>