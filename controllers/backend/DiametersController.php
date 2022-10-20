<?php

namespace app\controllers\backend;

use app\models\backend\Diameters;
use app\models\backend\DiametersSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiametersController implements the CRUD actions for Diameters model.
 */
class DiametersController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'denyCallback' => function ($rule, $action) {
                        return $this->redirect(['backend/error']);
                    },
                    'rules' => [
                        [
                            'actions' => ['index', 'view', 'create', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Diameters models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DiametersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diameters model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Diameters model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Diameters();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Diameters model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Diameters model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Diameters model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Diameters the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diameters::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRole()
    {
//        $adminRole = Yii::$app->authManager->createRole('admin');
//        $adminRole->description = 'Администратор';
//        Yii::$app->authManager->add($adminRole);
//
//        $employeeRole = Yii::$app->authManager->createRole('employee');
//        $employeeRole->description = 'Сотрудник';
//        Yii::$app->authManager->add($employeeRole);

//        $permission = Yii::$app->authManager->createPermission('canSeePizzasList');
//        $permission->description = 'Доступ к списку пицц (сотрудникам)';
//        Yii::$app->authManager->add($permission);
//
//        $adminPermission = Yii::$app->authManager->createPermission('casSeeAdmin');
//        $adminPermission->description = 'Доступ к списку пицц (сотрудникам)';
//        Yii::$app->authManager->add($adminPermission);
//
//        $role = Yii::$app->authManager->getRole('employee');
//        Yii::$app->authManager->addChild($role, $permission);
//
//        $adminRole = Yii::$app->authManager->getRole('admin');
//        Yii::$app->authManager->addChild($adminRole, $adminPermission);

        $userRole = Yii::$app->authManager->getRole('admin');
        Yii::$app->authManager->assign($userRole, 100);
//
        return 'Success!';
    }
}
