<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaParameters $model */

$parameter = $model::findOne($model->id);

$this->title = $parameter->pizza->title;
$this->params['breadcrumbs'][] = ['label' => 'Параметры пицц', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pizza-parameters-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Наименование пиццы',
                'value' => $parameter->pizza->title,
            ],
            [
                'label' => 'Диаметр, см',
                'value' => $parameter->diameter->value,
            ],
            'weight',
            'pizza_price',
            'piece_price',
        ],
    ]) ?>

</div>
