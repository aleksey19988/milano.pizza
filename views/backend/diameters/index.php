<?php

use app\models\backend\Diameters;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\backend\DiametersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Диаметры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diameters-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить диаметр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'value',
            [
                'attribute' => 'is_active',
                'content' => function($data) {
                    return $data->is_active ? 'Да' : 'Нет';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Diameters $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
