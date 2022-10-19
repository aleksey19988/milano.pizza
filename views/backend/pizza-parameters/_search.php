<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaParametersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pizza-parameters-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pizza_id') ?>

    <?= $form->field($model, 'diameter_id') ?>

    <?= $form->field($model, 'weight') ?>

    <?= $form->field($model, 'pizza_price') ?>

    <?php // echo $form->field($model, 'piece_price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
