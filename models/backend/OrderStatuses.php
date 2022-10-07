<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "d_order_statuses".
 *
 * @property int $id
 * @property string|null $status_name Наименование статуса
 * @property int $is_active Активен
 *
 * @property Orders[] $orders
 */
class OrderStatuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'd_order_statuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'integer'],
            [['status_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_name' => 'Status Name',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['fk_order_status' => 'id']);
    }
}
