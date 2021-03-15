<?php

namespace app\controllers;

use app\models\Department;
use app\models\Service;

class DepartmentController extends \yii\web\Controller
{
    public function actionView($id){

    	$dep = Department::find()->with('services')->where(['id' => $id])->one();

		return $this->render('view', compact('dep'));

    }

    public function actionIndex(){

		  return $this->render('index', compact('depts'));

    }

}
