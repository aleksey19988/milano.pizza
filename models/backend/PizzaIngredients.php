<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "pizza_ingredients".
 *
 * @property int $id
 * @property int $pizza_id ID пиццы
 * @property int $ingredient_id ID ингредиента
 *
 * @property Ingredients $ingredient
 * @property Pizzas $pizza
 */
class PizzaIngredients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pizza_ingredients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pizza_id', 'ingredient_id'], 'required'],
            [['pizza_id', 'ingredient_id'], 'integer'],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::class, 'targetAttribute' => ['ingredient_id' => 'id']],
            [['pizza_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pizzas::class, 'targetAttribute' => ['pizza_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pizza_id' => 'Pizza ID',
            'ingredient_id' => 'Ingredient ID',
        ];
    }

    /**
     * Gets query for [[Ingredient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredients::class, ['id' => 'ingredient_id']);
    }

    /**
     * Gets query for [[Pizza]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPizza()
    {
        return $this->hasOne(Pizzas::class, ['id' => 'pizza_id']);
    }
}
