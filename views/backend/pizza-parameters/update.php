<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaParameters $model */
/** @var app\models\backend\Pizzas $pizzas */
/** @var app\models\backend\Diameters $diameters */

$this->title = 'Редактировать параметры пиццы: ' . $model->pizza->title;
$this->params['breadcrumbs'][] = ['label' => 'Параметры пицц', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pizza->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Сохранить';
?>
<div class="pizza-parameters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pizzas' => $pizzas,
        'diameters' => $diameters,
    ]) ?>

</div>
