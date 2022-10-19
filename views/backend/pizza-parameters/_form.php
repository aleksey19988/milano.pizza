<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaParameters $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pizza-parameters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pizza_id')->textInput() ?>

    <?= $form->field($model, 'diameter_id')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'pizza_price')->textInput() ?>

    <?= $form->field($model, 'piece_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
