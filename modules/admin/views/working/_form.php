<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\DoctorWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Working */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="working-form">

    <?php $form = ActiveForm::begin(); ?>

		<div class="row">
	    	<div class="col-md-6">
	    		<?= $form->field($model, 'day')->dropDownList([
			    	'Понедельник' => 'Понедельник',
			    	'Вторник' => 'Вторник',
			    	'Среда' => 'Среда',
			    	'Четверг' => 'Четверг',
			    	'Пятница' => 'Пятница',
			    	'Суббота' => 'Суббота',
			    	'Воскресенье' => 'Воскресенье',
			    ]) ?>
	    	</div>

		 	<div class="col-md-3">
		 		<?= $form->field($model, 'work_from')->input('time', ['min' => '09:00', 'max' => '21:00', 'value' => '09:00']) ?>
		 	</div>
		 	<div class="col-md-3">
		 		<?= $form->field($model, 'work_to')->input('time', ['min' => '09:00', 'max' => '21:00', 'value' => '21:00']) ?>
		 	</div>	
		
			<div class="col-md-6">
				<div class="form-group field-product-id_category has-success">
			        <label class="control-label" for="product-id_category">Врач</label>
			        <select id="product-id_category" class="form-control" name="Working[id]" aria-invalid="false">
			            <?= DoctorWidget::widget(['tpl' => 'select_doctor', 'model' => $model]) ?>
			        </select>

			        <div class="help-block"></div>
			    </div>
			</div>
		</div>

		<div class="clear"></div>

	    <div class="form-group">
	        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
	    </div>

    <?php ActiveForm::end(); ?>

</div>
