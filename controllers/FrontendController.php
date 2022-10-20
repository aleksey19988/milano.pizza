<?php

namespace app\controllers;

use app\models\Pizzas;
use app\models\ReadyPizzas;
use Yii;
use yii\base\BaseObject;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class FrontendController extends Controller
{
    public $layout = 'frontend-layout';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'denyCallback' => function ($rule, $action) {
                    return $this->redirect(['site/login']);
                },
                'rules' => [
                    [
                        'actions' => ['logout', 'index'],
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
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Отображение страницы для посетителей
     *
     * @return string
     */
    public function actionIndex()
    {
        $readyPizzas = ReadyPizzas::find()
            ->with(['pizza'])
            ->all();
        return $this->render('index', compact( 'readyPizzas'));
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

    public function actionUpdateContent()
    {
        $readyPizzas = ReadyPizzas::find()
            ->with(['pizza'])
            ->all();
        return $this->renderAjax('index', compact( 'readyPizzas'));
    }
}
