<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MenuWidget;
use kartik\select2\Select2;
use app\modules\admin\models\Department;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-product-id_category has-success">
        <label class="control-label" for="product-id_category">Отделение</label>
        <select id="product-id_category" class="form-control" name="Service[id_department]" aria-invalid="false">
            <?= MenuWidget::widget(['tpl' => 'select_department', 'model' => $model]) ?>
        </select>

        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'photo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
