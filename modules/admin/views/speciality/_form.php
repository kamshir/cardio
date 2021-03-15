<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ServiceWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Speciality */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="speciality-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-product-id_category has-success">
        <label class="control-label" for="product-id_category">Услуга</label>
        <select id="product-id_category" class="form-control" name="Speciality[id_service]" aria-invalid="false">
            <?= ServiceWidget::widget(['tpl' => 'select_service', 'model' => $model]) ?>
        </select>

        <div class="help-block"></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
