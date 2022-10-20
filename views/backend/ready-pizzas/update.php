<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\ReadyPizzas $model */
/** @var app\models\backend\Pizzas $pizzas */

$this->title = 'Редактирование пиццы: ' . $model->pizza->title;
$this->params['breadcrumbs'][] = ['label' => 'Готовые пиццы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pizza->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="ready-pizzas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pizzas' => $pizzas,
    ]) ?>

</div>
