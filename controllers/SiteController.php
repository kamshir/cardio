<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Patient;
use app\models\ContactForm;
use app\models\Department;
use app\models\Service;
use app\models\Working;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['POST', "GET"],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dep = Department::find()->all();
        return $this->render('index', compact('dep'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if ($model->whois() == 1){
                return $this->redirect('/admin');
            }
            else {
                return $this->goHome();
            }
        }

        $model->password = '';
        $this->layout = 'form';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegone()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();
        if ($model->load(Yii::$app->request->post())) {

            $model->password();
            $model->whois = 2;
            $model->generateAuthKey();
            $model->save();
            
            return $this->redirect('/site/regtwo');
        }

        $model->password = '';
        $this->layout = 'form';
        return $this->render('regone', [
            'model' => $model,
        ]);
    }

    public function actionRegtwo()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Patient();
        if ($model->load(Yii::$app->request->post())) {
            
            $user = User::find()->orderBy(['id_user' => SORT_DESC])->one();
            $model->id_user = $user->id_user;
            Yii::$app->user->login($user, $model->rememberMe ? 3600*24*30 : 0);
            $model->save();

            return $this->goHome();
        }
        $this->layout = 'form';
        return $this->render('regtwo', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionFaq(){

        return $this->render('faq');
    }

    public function actionPrice(){

        $prices = Service::find()->orderBy('title')->all();

        return $this->render('price', compact('prices'));
    }

    public function actionReviews(){

        return $this->render('reviews');
    }

    public function actionSchedule()
    {

        return $this->render('schedule');
    }


    public function actionContacts(){
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->getSession()->setFlash('success', "Сообщение успешно отправлено.");
            return $this->refresh();
        }
        return $this->render('contacts', compact('model'));
    }
}
