<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\Diameters $model */

$this->title = 'Update Diameters: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Diameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diameters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
