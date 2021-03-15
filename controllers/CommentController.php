<?php

namespace app\controllers;

class CommentController extends \yii\web\Controller
{
    public function actionComment()
    {
    		$this->layout = false;
        return $this->render('comment');
    }

}
