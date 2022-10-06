<?php

/**
 * @var yii\web\View $this
 * @var \app\controllers\FrontendController $pizzas
 * @var \app\controllers\FrontendController $readyPizzas
 */

$this->title = 'Готовая пицца';
?>
<div class="site-index">

    <div class="card-group">
        <?php foreach ($readyPizzas as $readyPizza): ?>
            <div class="card" style="width: 18rem;">
                <img src="<?= empty($readyPizza->d_pizzas->image_path) ? '/web/images/pizza-plug.jpg' : $readyPizza->d_pizzas->image_path ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $readyPizza->d_pizzas->title ?></h5>
                    <p class="card-text pizza-weight">Вес: <?= $readyPizza->d_pizzas->weight ?></p>
                    <p class="card-text pizza-diameter">Диаметр: <?= $readyPizza->d_pizzas->diameter->diameter_value ?>см</p>
                    <p class="card-text pizza-price">Целая: <?= $readyPizza->d_pizzas->price ?> &#8381;</p>
                    <p class="card-text piece-price">Кусочек: <?= $readyPizza->d_pizzas->piece_price ?> &#8381;</p>
                    <p class="card-text available-for-sale">Сколько кусочков сейчас можно купить: <?= $readyPizza->number_of_pieces ?></p>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
