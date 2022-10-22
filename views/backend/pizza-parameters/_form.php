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

    <?php if ($model->pizza_id == null): ?>
        <?= $form->field($model, 'pizza_id')->dropDownList($pizzas->getPizzasIdListForParameters())->hint('Если вы не нашли в списке нужную пиццу, значит она была на прошлой странице и её нужно отредактировать')?>
    <?php else: ?>
        <?= $form->field($model, 'pizza_id')->dropDownList([$model->pizza_id => $model->pizza->title], ['disabled' => true]) ?>
    <?php endif; ?>

    <?= $form->field($model, 'diameter_id')->dropDownList($diameters->getDiametersList()) ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'pizza_price')->textInput() ?>

    <?= $form->field($model, 'piece_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
