<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\Diameters $model */

$this->title = 'Добавить диаметр';
$this->params['breadcrumbs'][] = ['label' => 'Доступные диаметры пиццы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diameters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>