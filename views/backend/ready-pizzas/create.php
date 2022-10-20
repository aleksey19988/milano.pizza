<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\ReadyPizzas $model */
/** @var app\models\backend\Pizzas $pizzas */

$this->title = 'Добавить готовую пиццу';
$this->params['breadcrumbs'][] = ['label' => 'Готовые пиццы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ready-pizzas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pizzas' => $pizzas,
    ]) ?>

</div>
