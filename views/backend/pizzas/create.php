<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\Pizzas $model */

$this->title = 'Добавить пиццу';
$this->params['breadcrumbs'][] = ['label' => 'Список пицц', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pizzas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
