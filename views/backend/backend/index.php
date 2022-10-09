<?php

/**
 * @var yii\web\View $this
 * @var \app\models\backend\Pizzas $pizzas
 * @var \app\models\backend\ReadyPizzas $readyPizzas
 * @var \app\models\backend\ReadyPizzas $model
 */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Готовая пицца';
$readyPizzasList = [];
foreach($readyPizzas as $readyPizza) {
    $readyPizzasList[$readyPizza->fk_pizza] = $readyPizza->number_of_pieces;
}
?>
    <h3>Список справочников выше &#10548;</h3>
    <h5>Для вашего удобства, наименования сортируются по алфавиту</h5>
    <p class="help-text">Редактируй количество доступных к продаже кусочков</p>
    <div class="row row-cols-2 mt-4">
        <?php foreach($pizzas as $pizza): ?>
            <div class="col">
                <div class="card text-center mt-3 border-secondary col">
                    <div class="card-body d-flex">
                        <div class="col-6">
                            <h5 class="card-title"><?= $pizza->title?></h5>
                            <div class="pizza-id-container d-none"><?= $pizza->id?></div>
                            <div class="d-flex justify-content-around align-items-center">
                                <button href="#" class="btn btn-danger btn-lg remove-piece-btn">-</button>
                                <div class="pieces-text d-inline-block">
                                    <?php
                                    $pizzaId = $pizza->id;
                                    if (array_key_exists($pizzaId, $readyPizzasList)) {
                                        print_r("<div class='pieces-count'>$readyPizzasList[$pizzaId]</div>");
                                    } else {
                                        print_r("<div class='pieces-count'>0</div>");
                                    }
                                    ?>
                                </div>
                                <button href="#" class="btn btn-success btn-lg add-piece-btn">+</button>
                            </div>
                        </div>
                        <div class="d-flex align-items-center col-6 add-pizza-btn-container">
                            <button href="#" class="btn btn-info h-100 d-flex align-items-center add-pizza-btn">Добавить целую пиццу</button>
                        </div>
                        <div class="col-3 d-none save-btn-container">
                            <button href="#" class="btn btn-success h-100 d-flex align-items-center justify-content-center save-btn">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

<?php
$this->registerJsFile(
    '@backend/js/index.js',
    [
        'depends' => [\yii\web\JqueryAsset::class],
        'type' => 'module'
    ]
);
?>