<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pizza_parameters".
 *
 * @property int $id
 * @property int $pizza_id ID пиццы
 * @property int $diameter_id ID диаметра
 * @property int $weight Вес, грамм
 * @property int $pizza_price Стоимость целой пиццы
 * @property int $piece_price Стоимость кусочка пиццы
 *
 * @property Diameters $diameter
 * @property Pizzas $pizza
 */
class PizzaParameters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pizza_parameters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pizza_id', 'diameter_id', 'weight', 'pizza_price', 'piece_price'], 'required'],
            [['pizza_id', 'diameter_id', 'weight', 'pizza_price', 'piece_price'], 'integer'],
            [['diameter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Diameters::class, 'targetAttribute' => ['diameter_id' => 'id']],
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
            'diameter_id' => 'Diameter ID',
            'weight' => 'Weight',
            'pizza_price' => 'Pizza Price',
            'piece_price' => 'Piece Price',
        ];
    }

    /**
     * Gets query for [[Diameter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiameter()
    {
        return $this->hasOne(Diameters::class, ['id' => 'diameter_id']);
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
