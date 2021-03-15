<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SpecialityWidget;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [])
        ]);
    ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quotes')->textarea(['row' => 30]) ?>

    <?= $form->field($model, 'status')->radioList([ '0' => 'Врач', '1' => 'Руководство', ]) ?>

    <div class="form-group field-product-id_category has-success">
        <label class="control-label" for="product-id_category">Специальность</label>
        <select id="product-id_category" class="form-control" name="Doctor[id_speciality]" aria-invalid="false">
            <?= SpecialityWidget::widget(['tpl' => 'select_speciality', 'model' => $model]) ?>
        </select>

        <div class="help-block"></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
