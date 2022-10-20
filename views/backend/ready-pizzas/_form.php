<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\backend\ReadyPizzas $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\backend\Pizzas $pizzas */
?>

<div class="ready-pizzas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pizza_id')->dropDownList($pizzas->getPizzasList()) ?>

    <?= $form->field($model, 'number_of_pieces')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
