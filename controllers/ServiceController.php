<?php

namespace app\controllers;

use app\models\Service;

class ServiceController extends \yii\web\Controller
{
    public function actionView($id){

    	$service = Service::find()->with('speciality')->where(['id' => $id])->one();

		return $this->render('view', compact('service'));

    }

}
