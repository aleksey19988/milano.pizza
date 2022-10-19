<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaParameters $model */
/** @var app\models\backend\Pizzas $pizzas */
/** @var app\models\backend\Diameters $diameters */

$this->title = 'Добавление параметров к пицце';
$this->params['breadcrumbs'][] = ['label' => 'Параметры пицц', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizza-parameters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pizzas' => $pizzas,
        'diameters' => $diameters,
    ]) ?>

</div>
