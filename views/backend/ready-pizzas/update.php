<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\ReadyPizzas $model */

$this->title = 'Редактирование готовой пиццы с id: ' . $model->id . " (" . ($model->d_pizzas->title) . ")";
$this->params['breadcrumbs'][] = ['label' => 'Готовые пиццы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="ready-pizzas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
