<?php

namespace app\models\backend;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pizzas".
 *
 * @property int $id
 * @property string $title Название пиццы
 * @property string|null $image_path Расположение изображения
 * @property int $is_active Активен
 *
 * @property PizzaIngredients[] $pizzaIngredients
 * @property PizzaParameters[] $pizzaParameters
 * @property ReadyPizzas[] $readyPizzas
 */
class Pizzas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pizzas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['is_active'], 'integer'],
            [['title', 'image_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование пиццы',
            'image_path' => 'Путь до изображения',
            'is_active' => 'Активен',
        ];
    }

    /**
     * Gets query for [[PizzaIngredients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPizzaIngredients()
    {
        return $this->hasMany(PizzaIngredients::class, ['pizza_id' => 'id']);
    }

    /**
     * Gets query for [[PizzaParameters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPizzaParameters()
    {
        return $this->hasMany(PizzaParameters::class, ['pizza_id' => 'id']);
    }

    /**
     * Gets query for [[ReadyPizzas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadyPizzas()
    {
        return $this->hasMany(ReadyPizzas::class, ['pizza_id' => 'id']);
    }

    /**
     * Возвращает список в виде:
     * [
     *   ['id' => 'title'],
     *   ['id' => 'title'],
     *   ...
     * ]
     *
     */
    public function getPizzasList(): array
    {
        return ArrayHelper::map($this::find()->all(), 'id', 'title');
    }
}
