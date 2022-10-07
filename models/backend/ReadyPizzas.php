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
 * @property DPizzas $fkPizza
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
            [['fk_pizza'], 'exist', 'skipOnError' => true, 'targetClass' => DPizzas::class, 'targetAttribute' => ['fk_pizza' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_pizza' => 'Fk Pizza',
            'number_of_pieces' => 'Number Of Pieces',
        ];
    }

    /**
     * Gets query for [[FkPizza]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkPizza()
    {
        return $this->hasOne(DPizzas::class, ['id' => 'fk_pizza']);
    }
}
