<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaIngredients $model */
/** @var app\models\backend\Pizzas $pizzas */
/** @var app\models\backend\Ingredients $ingredients */

$this->title = 'Добавить ингредиент к пицце';
$this->params['breadcrumbs'][] = ['label' => 'Ингредиенты в пиццах', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizza-ingredients-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pizzas' => $pizzas,
        'ingredients' => $ingredients,
    ]) ?>

</div>
