<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaIngredients $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\backend\Pizzas $pizzas */
/** @var app\models\backend\Ingredients $ingredients */
?>

<div class="pizza-ingredients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pizza_id')->dropDownList($pizzas->getPizzasList()) ?>

    <?= $form->field($model, 'ingredient_id')->dropDownList($ingredients->getIngredientsList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
