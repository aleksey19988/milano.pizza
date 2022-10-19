<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\ReadyPizzas $model */

$this->title = 'Create Ready Pizzas';
$this->params['breadcrumbs'][] = ['label' => 'Ready Pizzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ready-pizzas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
