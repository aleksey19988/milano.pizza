<?php

/**
 * @var yii\web\View $this
 * @var \app\models\backend\Pizzas $pizzas
 * @var \app\models\backend\ReadyPizzas $readyPizzas
 */

$this->title = 'Готовая пицца';
$readyPizzasList = [];
foreach($readyPizzas as $readyPizza) {
    $readyPizzasList[$readyPizza->fk_pizza] = $readyPizza->number_of_pieces;
}
?>
<h3>Список справочников выше &#10548;</h3>
<h5>Для вашего удобства, наименования сортируются по алфавиту</h5>
<p class="help-text">Редактируй количество доступных к продаже кусочков</p>
<div class="row mt-4">
    <?php foreach($pizzas as $pizza): ?>
        <div class="col-6">
            <div class="card text-center mt-3" /*style="width: 25rem;"*/>
                <div class="card-body d-flex">
                    <div class="col-9">
                        <h5 class="card-title"><?= $pizza->title ?></h5>
                        <div class="d-flex justify-content-around align-items-center">
                            <a href="#" class="btn btn-danger">-</a>
                            <div class="pieces-text d-inline-block">
                                <?php
                                $pizzaId = $pizza->id;
                                if (array_key_exists($pizzaId, $readyPizzasList)) {
                                    print_r($readyPizzasList[$pizzaId]);
                                } else {
                                    print_r(0);
                                }
                                ?>
                            </div>
                            <a href="#" class="btn btn-success">+</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center col-3">
                        <a href="#" class="btn btn-success h-100 d-flex align-items-center">Добавить целую пиццу</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

