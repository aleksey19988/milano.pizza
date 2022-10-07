<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $order_content Содержание заказа
 * @property string|null $created_at Дата и время создания заказа
 * @property string|null $closed_at Дата и время закрытия заказа
 * @property int|null $fk_order_status
 * @property int|null $total Сумма заказа
 *
 * @property OrderStatuses $fkOrderStatus
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_content'], 'required'],
            [['created_at', 'closed_at'], 'safe'],
            [['fk_order_status', 'total'], 'integer'],
            [['order_content'], 'string', 'max' => 255],
            [['fk_order_status'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatuses::class, 'targetAttribute' => ['fk_order_status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_content' => 'Содержание заказа',
            'created_at' => 'Дата и время создания заказа',
            'closed_at' => 'Дата и время закрытия заказа',
            'fk_order_status' => 'Статус заказа',
            'total' => 'Сумма заказа, руб.',
        ];
    }

    /**
     * Gets query for [[FkOrderStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkOrderStatus()
    {
        return $this->hasOne(OrderStatuses::class, ['id' => 'fk_order_status']);
    }
}
