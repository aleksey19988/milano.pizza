<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "d_pizzas".
 *
 * @property int $id
 * @property string $title Название пиццы
 * @property int|null $weight Вес пиццы
 * @property int|null $fk_diameter Диаметр пиццы
 * @property int|null $ingredients Ингредиенты
 * @property int|null $price Стоимость пиццы
 * @property int|null $piece_price Стоимость кусочка пиццы
 * @property int $is_active Активен
 * @property string|null $image_path
 *
 * @property Diameters $fkDiameter
 * @property ReadyPizzas[] $ready-pizzas
 */
class Pizzas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'd_pizzas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['weight', 'fk_diameter', 'ingredients', 'price', 'piece_price', 'is_active'], 'integer'],
            [['title', 'image_path'], 'string', 'max' => 255],
            [['fk_diameter'], 'exist', 'skipOnError' => true, 'targetClass' => Diameters::class, 'targetAttribute' => ['fk_diameter' => 'id']],
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
            'weight' => 'Weight',
            'fk_diameter' => 'Fk Diameter',
            'ingredients' => 'Ingredients',
            'price' => 'Price',
            'piece_price' => 'Piece Price',
            'is_active' => 'Is Active',
            'image_path' => 'Image Path',
        ];
    }

    /**
     * Gets query for [[FkDiameter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkDiameter()
    {
        return $this->hasOne(Diameters::class, ['id' => 'fk_diameter']);
    }

    /**
     * Gets query for [[ReadyPizzas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReadyPizzas()
    {
        return $this->hasMany(ReadyPizzas::class, ['fk_pizza' => 'id']);
    }
}
