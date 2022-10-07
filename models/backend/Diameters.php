<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "d_diameters".
 *
 * @property int $id
 * @property int $diameter_value Диаметр (см)
 * @property int $is_active Активен
 *
 * @property Pizzas[] $dPizzas
 */
class Diameters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'd_diameters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diameter_value'], 'required'],
            [['diameter_value', 'is_active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'diameter_value' => 'Диаметр (см)',
            'is_active' => 'Активен',
        ];
    }

    /**
     * Gets query for [[DPizzas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDPizzas()
    {
        return $this->hasMany(Pizzas::class, ['fk_diameter' => 'id']);
    }
}
