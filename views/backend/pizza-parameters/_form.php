<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaParameters $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\backend\Pizzas $pizzas */
/** @var app\models\backend\Diameters $diameters */
?>

<div class="pizza-parameters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pizza_id')->dropDownList($pizzas->getPizzasList()) ?>

    <?= $form->field($model, 'diameter_id')->dropDownList($diameters->getDiametersList()) ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'pizza_price')->textInput() ?>

    <?= $form->field($model, 'piece_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
