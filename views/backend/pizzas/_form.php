<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\Pizzas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pizzas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'fk_diameter')->dropDownList(\app\models\backend\Diameters::find()->select(['diameter_value'])->orderBy('diameter_value')->column()) ?>

    <?= $form->field($model, 'ingredients')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'piece_price')->textInput() ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <?= $form->field($model, 'image_path')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
