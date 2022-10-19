<?php

namespace app\models\backend;

use Yii;
use yii\helpers\ArrayHelper;

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
            'value' => 'Значение, см',
            'is_active' => 'Активен',
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

    /**
     * Возвращает список в виде:
     * [
     *   ['id' => 'value'],
     *   ['id' => 'value'],
     *   ...
     * ]
     *
     */
    public function getDiametersList(): array
    {
        return ArrayHelper::map($this::find()->all(), 'id', 'value');
    }
}
