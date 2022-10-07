<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\backend\Ingredients $model */

$this->title = 'Добавить ингредиент';
$this->params['breadcrumbs'][] = ['label' => 'Ингредиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredients-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
