<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\Diameters $model */

$this->title = 'Редактирование диаметра: ' . $model->value . ' см';
$this->params['breadcrumbs'][] = ['label' => 'Диаметры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->value . ' см', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="diameters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
