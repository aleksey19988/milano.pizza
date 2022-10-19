<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "ready_pizzas".
 *
 * @property int $id
 * @property int $pizza_id ID пиццы
 * @property int $number_of_pieces Количество кусочков
 *
 * @property Pizzas $pizza
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
            [['pizza_id', 'number_of_pieces'], 'required'],
            [['pizza_id', 'number_of_pieces'], 'integer'],
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
            'number_of_pieces' => 'Number Of Pieces',
        ];
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
