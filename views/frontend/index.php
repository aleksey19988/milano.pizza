<?php

/**
 * @var yii\web\View $this
 * @var \app\controllers\FrontendController $readyPizzas
 */

$this->title = 'Готовая пицца';
?>
<div class="site-index">
<!--    <h2 class="text-danger">Внимание! страница обновляется каждые 10 секунд!</h2>-->
    <h3 class="text-center">Пиццы, которые вас ждут &#127829;</h3>
    <table class="table mt-5  border-dark" id="table-content">
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
                    <th class="card-title"><?= $readyPizza->d_pizzas->title ?></th>
                    <td class="card-text pizza-price"> <?= $readyPizza->d_pizzas->price ?> &#8381;</td>
                    <td class="card-text piece-price"><?= $readyPizza->d_pizzas->piece_price ?> &#8381;</td>
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
