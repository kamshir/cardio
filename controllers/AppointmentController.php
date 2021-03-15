<?php

namespace app\controllers;

use Yii;
use app\models\Appointment;

class AppointmentController extends \yii\web\Controller
{
    public function actionIndex(){
    	
    	$model = new Appointment();

    	if ($model->load(Yii::$app->request->post()) && $model->send(Yii::$app->params['adminEmail'])) {
      	 Yii::$app->getSession()->setFlash('success', "Ваша заявка отправлена. Мы свяжемся с вами, чтобы договориться о точности времени.");
         return $this->refresh();
      }
		
		return $this->render('index', compact('model'));
    }

}
