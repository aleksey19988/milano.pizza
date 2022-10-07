<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\Orders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'closed_at')->textInput() ?>

    <?= $form->field($model, 'fk_order_status')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
