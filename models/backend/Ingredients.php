<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "d_ingredients".
 *
 * @property int $id
 * @property string $ingredient_name Название ингредиента
 * @property int $is_active Активен
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'd_ingredients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ingredient_name'], 'required'],
            [['is_active'], 'integer'],
            [['ingredient_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ingredient_name' => 'Ingredient Name',
            'is_active' => 'Is Active',
        ];
    }
}
