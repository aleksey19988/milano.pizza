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
 * @property DOrderStatuses $fkOrderStatus
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
            [['fk_order_status'], 'exist', 'skipOnError' => true, 'targetClass' => DOrderStatuses::class, 'targetAttribute' => ['fk_order_status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_content' => 'Order Content',
            'created_at' => 'Created At',
            'closed_at' => 'Closed At',
            'fk_order_status' => 'Fk Order Status',
            'total' => 'Total',
        ];
    }

    /**
     * Gets query for [[FkOrderStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkOrderStatus()
    {
        return $this->hasOne(DOrderStatuses::class, ['id' => 'fk_order_status']);
    }
}
