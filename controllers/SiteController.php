<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\LabOneFormOne;
use app\models\LabOneFormTwo;
use app\models\services;
use app\models\tenants;
use app\models\apartments;
use app\models\payment;
use app\models\OneqForm;
use app\models\TwoqForm;
use app\models\ThreeqForm;
use app\models\FourqForm;
use app\models\FiveqForm;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
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
        return $this->render('index');
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
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
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
            Yii::$app->session->setFlash('contactFormSubmitted');

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
    
    public function actionSay($message = 'Привет')
    {
        return $this->render('say', ['message' => $message]);
    }

    public function actionEntry()
    {
        $model = new EntryForm();
        return $this->render('entry', ['model' => $model]);
    }
    public function actionInfo()
    {
        return $this->render('info');
    }
    public function actionLabone()
    {
        $model1 = new LabOneFormOne();
        $model2 = new LabOneFormTwo();
        $model1->load(Yii::$app->request->post()) && $model1->validate();
        $model2->load(Yii::$app->request->post()) && $model2->validate();
        return $this->render('labone', ['model1' => $model1,'model2' =>$model2]);
    }
    public function actionLabtwo()
    {
        $services = services::find()->all();
        $payment = payment::find()->with('tenants')->with('services')->all();
        $tenants = tenants::find()->all();
        $apartments = apartments::find()->with('tenants')->all();

        $queryOne = new OneqForm();
        $queryOne->load(Yii::$app->request->post()) && $queryOne->validate();
        $queryTwo = new TwoqForm();
        $queryTwo->load(Yii::$app->request->post()) && $queryTwo->validate();
        $queryThree = new ThreeqForm;
        $queryThree->load(Yii::$app->request->post()) && $queryThree->validate();
    $queryFour = new FourqForm();
    $queryFour->load(Yii::$app->request->post()) && $queryFour->validate();
    $queryFive = new FiveqForm();
    $queryFive->load(Yii::$app->request->post()) && $queryFive->validate();
        return $this-> render('labtwo',
                        ['services' => $services,
                        'payment' => $payment,
                        'tenants' => $tenants,
                        'apartments' => $apartments,
                        'queryOne' =>$queryOne,
                        'queryTwo' =>$queryTwo,
                        'queryThree' =>$queryThree,
                        'queryFour' =>$queryFour,
                        'queryFive' =>$queryFive,
        ]);
    }
    public function actionLabthree()
    {
        return $this-> render('labthree');
    }
}
