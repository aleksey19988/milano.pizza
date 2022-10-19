<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\PizzaParameters $model */

$this->title = 'Редактировать параметры пиццы: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Параметры пицц', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Сохранить';
?>
<div class="pizza-parameters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
