<?php

namespace app\controllers\backend;

use app\models\Pizzas;
use app\models\ReadyPizzas;
use Yii;
use yii\base\BaseObject;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class BackendController extends Controller
{
    public $layout = 'backend-layout';

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
     * Отображение страницы для сотрудников
     *
     * @return string
     */
    public function actionIndex()
    {
        $pizzas = Pizzas::find()
            ->orderBy('title')
            ->all();
        $readyPizzas = ReadyPizzas::find()
            ->all();
        $model = new ReadyPizzas();
        return $this->render('index', compact('pizzas', 'readyPizzas', 'model'));
    }

    public function actionAbout()
    {
        return 'About page';
    }
}
