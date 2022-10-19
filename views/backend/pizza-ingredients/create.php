<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaIngredients $model */

$this->title = 'Create Pizza Ingredients';
$this->params['breadcrumbs'][] = ['label' => 'Pizza Ingredients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizza-ingredients-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
