<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        if (Yii::$app->user->identity['whois'] == 2){
            return $this->goBack();
        }
        else {
            return $this->render('index');
        }
    }

    public function actionLogout(){
    	Yii::$app->user->logout();

    	return $this->goHome();
    }

}
