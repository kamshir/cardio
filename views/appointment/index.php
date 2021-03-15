<?php 
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\Url;
	use kartik\datetime\DateTimePicker;
	use app\components\DoctorWidget;
	use app\widgets\Alert;

	$this->title = 'Записаться к врачу';
 ?>

<div id="content">

	<div class="container">

		<?= Alert::widget() ?>

		<h1 class="text-center">Заполните форму</h1>

		<?php $form = ActiveForm::begin(); ?>

		<div class="row form-group">
			<div class="col-md-4">
				<?= $form->field($model, 'first_name')->textInput(['class' => 'form-control mb', 'placeholder' => 'Ваше имя', 'id' => 'fname']) ?>
			</div>
			<div class="col-md-4">
				<?= $form->field($model, 'last_name')->textInput(['class' => 'form-control mb', 'placeholder' => 'Ваша фамилия', 'id' => 'lname']) ?>
			</div>
			<div class="col-md-4">
				<?= $form->field($model, 'middle_name')->textInput(['class' => 'form-control mb', 'placeholder' => 'Ваше отчество', 'id' => 'mname']) ?>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-6">
				<?= $form->field($model, 'email')->input('email', ['class' => 'form-control', 'placeholder' => 'Ваше почта', 'id' => 'email']) ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'phone')->input('phone', ['class' => 'form-control', 'placeholder' => 'Ваш телефон', 'id' => 'phone']) ?>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-6">
				<div class="form-group field-product-id_category has-success">
			        <label class="control-label" for="product-id_category">Врач</label>
			        <select id="product-id_category" class="form-control" name="Appointment[id]" aria-invalid="false">
			            <?= DoctorWidget::widget(['tpl' => 'select_doctor', 'model' => $model]) ?>
			        </select>

			        <div class="help-block"></div>
			    </div>
			</div>
			<div class="col-md-6">
				<?php 
					if($model->date_appointment) {
					    $model->date_appointment = date("d.m.Y H:i", (integer) $model->date_appointment);
					}    
					echo $form->field($model, 'date_appointment')->widget(DateTimePicker::className(),[
					    'name' => 'date_appointment',
					    'type' => DateTimePicker::TYPE_INPUT,
					    'options' => ['placeholder' => 'Ввод даты/времени...'],
					    'value'=> date("d.m.Y H:i",(integer) $model->date_appointment),
					    'pluginOptions' => [
					        'format' => 'dd.mm.yyyy H:i',
					        'autoclose'=>true,
					        'weekStart'=>1, //неделя начинается с понедельника
					        'todayHighlight'=>true, //снизу кнопка "сегодня",
					        'startDate' => date("d.m.Y H:i"),
					        'endDate' => date("d.m.Y H:i", time()+60*60*24*7),
					        'todayBtn' => true,
					    ]
					]); ?>
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-12">
				<?= $form->field($model, 'comment')->textarea(['class' => 'form-control comment', 'placeholder' => 'Что вас беспокоит, как ваше самочувствие?', 'rows' => 10]) ?>
			</div>
		</div>

		<div class="form-group text-center">
			<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary send_message', 'name' => 'contact-button']) ?>
		</div>

	<?php ActiveForm::end(); ?>

	</div>

</div>