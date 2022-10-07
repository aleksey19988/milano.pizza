<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "ready_pizzas".
 *
 * @property int $id
 * @property int $fk_pizza Наименование пиццы
 * @property int $number_of_pieces Количество кусочков
 *
 * @property Pizzas $fkPizza
 */
class ReadyPizzas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ready_pizzas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_pizza', 'number_of_pieces'], 'required'],
            [['fk_pizza', 'number_of_pieces'], 'integer'],
            [['fk_pizza'], 'exist', 'skipOnError' => true, 'targetClass' => Pizzas::class, 'targetAttribute' => ['fk_pizza' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_pizza' => 'Наименование пиццы',
            'number_of_pieces' => 'Кол-во доступных кусочков',
            'd_pizzas.title' => 'Наименование пиццы',
        ];
    }

    /**
     * Gets query for [[FkPizza]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getd_pizzas()
    {
        return $this->hasOne(Pizzas::class, ['id' => 'fk_pizza']);
    }
}
