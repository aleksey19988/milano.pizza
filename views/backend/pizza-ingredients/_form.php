<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaIngredients $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pizza-ingredients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pizza_id')->textInput() ?>

    <?= $form->field($model, 'ingredient_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
