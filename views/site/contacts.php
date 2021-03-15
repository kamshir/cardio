<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\widgets\Alert;
/* @var $this yii\web\View */

$this->title = 'Контакты';
?>

<div id="colorlib-contact">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 animate-box">
				<?= Alert::widget() ?>
				<h3>Контактная информация</h3>
				<div class="row contact-info-wrap">
					<div class="col-md-3">
						<p><span><i class="fas fa-map-marker-alt"></i></span> 198 West 21th Street, <br> Suite 721 New York NY 10016</p>
					</div>
					<div class="col-md-3">
						<p><span><i class="fas fa-phone-alt"></i></span> <a href="tel://<?= Yii::$app->params['phone'] ?>"><?= Yii::$app->params['phone'] ?></a></p>
					</div>
					<div class="col-md-4">
						<p><span><i class="far fa-envelope"></i></span> <a href="mailto:<?= Yii::$app->params['adminEmail'] ?>"><?= Yii::$app->params['adminEmail'] ?></a></p>
					</div>
					<div class="col-md-2">
						<p><span><i class="fas fa-globe"></i></span> <a href="#">yoursite.com</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-10 col-md-offset-1 animate-box">
				<h3 class="font-weight-bold">Свяжитесь с нами</h3>

				<?php $form = ActiveForm::begin(); ?>

					<div class="row form-group">
						<div class="col-md-6">
							<?= $form->field($model, 'fname')->textInput(['class' => 'form-control mb', 'placeholder' => 'Ваше имя', 'id' => 'fname']) ?>
						</div>
						<div class="col-md-6">
							<?= $form->field($model, 'lname')->textInput(['class' => 'form-control mb', 'placeholder' => 'Ваша фамилия', 'id' => 'lname']) ?>
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
						<div class="col-md-12">
							<?= $form->field($model, 'subject')->textInput(['class' => 'form-control', 'placeholder' => 'Тема вашего сообщения', 'id' => 'subject']) ?>
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-12">
							<?= $form->field($model, 'body')->textarea(['class' => 'form-control', 'placeholder' => 'Напишите что-нибудь о нас', 'rows' => 10, 'id' => 'message']) ?>
						</div>
					</div>

					<?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::classname(), [
					    'options' => [
					    	'class' => 'form-control',
					    ]
					]) ?>

					<div class="form-group text-center">
						<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary send_message', 'name' => 'contact-button']) ?>
					</div>

				<?php ActiveForm::end(); ?>

			</div>
		</div>
	</div>
</div>