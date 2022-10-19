<?php

use app\models\backend\PizzaIngredients;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView as GridViewAlias;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaIngredientsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Ингредиенты в пиццах';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizza-ingredients-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить ингредиент в пиццу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute' => 'pizza_id',
                'content' => function($data) {
                    return $data->pizza->title;
                },
//                'group' => true,
            ],
            [
                'attribute' => 'ingredient_id',
                'content' => function($data) {
                    return $data->ingredient->title;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PizzaIngredients $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>
