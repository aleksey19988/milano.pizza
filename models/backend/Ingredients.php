<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property int $id
 * @property string $title Название ингредиента
 * @property int $is_active Активен
 *
 * @property PizzaIngredients[] $pizzaIngredients
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['is_active'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * Gets query for [[PizzaIngredients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPizzaIngredients()
    {
        return $this->hasMany(PizzaIngredients::class, ['ingredient_id' => 'id']);
    }
}
