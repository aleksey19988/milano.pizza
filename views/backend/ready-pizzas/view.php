<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\backend\ReadyPizzas $model */

$this->title = $model->pizza->title;
$this->params['breadcrumbs'][] = ['label' => 'Готовые пиццы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ready-pizzas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент? (' . $model->pizza->title . ')',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            [
                'label' => 'Наименование пиццы',
                'attribute' => 'pizza_active',
                'value' => $model->pizza->title,
            ],
            'number_of_pieces',
        ],
    ]) ?>

</div>
