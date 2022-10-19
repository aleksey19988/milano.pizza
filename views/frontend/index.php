<?php

/**
 * @var yii\web\View $this
 * @var app\controllers\FrontendController $readyPizzas
 */

use app\models\PizzaParameters;

$this->title = 'Готовая пицца';
?>
<div class="site-index">
<!--    <h2 class="text-danger">Внимание! страница обновляется каждые 10 секунд!</h2>-->
    <h3 class="text-center mb-5">Пицца &#127829;</h3>
    <table class="table table-bordered table-striped" id="table-content">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Стоимость</th>
            <th scope="col">Кусочек</th>
            <th scope="col">Сколько кусочков вас ждут</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($readyPizzas as $readyPizza): ?>
            <?php if ($readyPizza->number_of_pieces > 0): ?>
                <tr>
                    <th class="card-title"><?= $readyPizza->pizza->title ?></th>
                    <td class="card-text pizza-price"> <?= PizzaParameters::findOne($readyPizza->pizza->id)['pizza_price'] ?> &#8381;</td>
                    <td class="card-text piece-price"><?= PizzaParameters::findOne($readyPizza->pizza->id)['piece_price'] ?> &#8381;</td>
                    <td class="card-text available-for-sale"><?= $readyPizza->number_of_pieces ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    setInterval("ajaxCall()", 10000);
    let ajaxCall = function() {
        $('#table-content').load(document.URL +  ' #table-content');
    }
</script>
