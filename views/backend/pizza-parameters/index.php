<?php

use app\models\backend\PizzaParameters;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaParametersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Параметры пицц';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizza-parameters-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить параметры к пицце', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            [
                'attribute' => 'pizza_id',
                'label' => 'Наименование пиццы',
                'content' => function($data){
                    return $data->pizza->title;
                }
            ],
            [
                'attribute' => 'diameter_id',
                'label' => 'Диаметр, см',
                'content' => function($data){
                    return $data->diameter->value;
                }
            ],
            'weight',
            'pizza_price',
            'piece_price',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PizzaParameters $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
