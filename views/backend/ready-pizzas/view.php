<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\backend\ReadyPizzas $model */

$this->title = $model->d_pizzas->title;
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
                'confirm' => 'Вы уверены, что хотите удалить пиццу?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="col-4 p-0">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
//            'id',
                'fk_pizza',
                'number_of_pieces',
            ],
        ]) ?>
    </div>

</div>
