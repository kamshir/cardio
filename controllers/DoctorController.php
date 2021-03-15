<?php

namespace app\controllers;

use Yii;
use app\models\Doctor;
use app\models\Comment;
use yii\filters\VerbFilter;

class DoctorController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'view' => ['POST', 'GET'],
                ],
            ],
        ];
    }

    public function actionIndex(){

    	$doctors = Doctor::find()->with('speciality')->all();
		return $this->render('index', compact('doctors'));
    }

    public function actionView($id){

    	$model = new Comment();
        $comments = Comment::find()->where(['id' => $id])->asArray()->all();
    	$doctor = Doctor::find()->where(['id' => $id])->with('speciality', 'working', 'social')->one();
		return $this->render('view', compact('doctor', 'model', 'comments'));
    }

}
