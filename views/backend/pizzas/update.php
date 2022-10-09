<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\Pizzas $model */

$this->title = 'Редактирование пиццы: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Список пицц', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
$model['fk_diameter'] -= 1;
?>
<div class="pizzas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
