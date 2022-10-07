<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\ReadyPizzas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ready-pizzas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_pizza')->textInput() ?>

    <?= $form->field($model, 'number_of_pieces')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
