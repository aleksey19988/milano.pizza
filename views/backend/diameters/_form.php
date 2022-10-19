<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\Diameters $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diameters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <?= $form->field($model, 'is_active')->dropDownList([1 => 'Да', 0 => 'Нет']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
