<?php

namespace app\controllers;

use app\models\Pizzas;
use app\models\ReadyPizzas;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
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
     * Отображение страницы для посетителей
     *
     * @return string
     */
    public function actionIndex()
    {
        $pizzas = Pizzas::find()->all();
        $readyPizzas = ReadyPizzas::find()
            ->with('d_pizzas')
            ->all();
        return $this->render('index', compact('pizzas', 'readyPizzas'));
    }
}
