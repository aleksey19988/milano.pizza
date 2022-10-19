<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaIngredients $model */

$this->title = 'Update Pizza Ingredients: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pizza Ingredients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pizza-ingredients-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
