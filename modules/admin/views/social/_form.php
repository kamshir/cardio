<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\DoctorWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Social */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="social-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group field-product-id_category has-success">
        <label class="control-label" for="product-id_category">Врач</label>
        <select id="product-id_category" class="form-control" name="Social[id]" aria-invalid="false">
            <?= DoctorWidget::widget(['tpl' => 'select_doctor', 'model' => $model]) ?>
        </select>

        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'vk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
