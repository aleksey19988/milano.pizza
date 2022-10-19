<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\Pizzas $model */

$this->title = 'Create Pizzas';
$this->params['breadcrumbs'][] = ['label' => 'Pizzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizzas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
