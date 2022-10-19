<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diameters".
 *
 * @property int $id
 * @property int $value Размер, см
 * @property int $is_active Активен
 *
 * @property PizzaParameters[] $pizzaParameters
 */
class Diameters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diameters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value', 'is_active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * Gets query for [[PizzaParameters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPizzaParameters()
    {
        return $this->hasMany(PizzaParameters::class, ['diameter_id' => 'id']);
    }
}
