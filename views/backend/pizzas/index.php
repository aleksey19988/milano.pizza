<?php

use app\models\backend\Pizzas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Список пицц';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizzas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новую пиццу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
//            'image_path',
            [
                'attribute' => 'is_active',
                'label' => 'Доступна к продаже',
                'content' => function($data) {
                    return $data->is_active ? 'Да' : 'Нет';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pizzas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
