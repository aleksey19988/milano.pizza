<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\Diameters $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diameters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'diameter_value')->textInput() ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
