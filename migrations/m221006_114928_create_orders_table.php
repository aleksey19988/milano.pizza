<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m221006_114928_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'order_content' => $this->string()->notNull()->comment('Содержание заказа'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата и время создания заказа'),
            'closed_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('Дата и время закрытия заказа'),
            'fk_order_status' => $this->integer()->defaultValue(1)->comment('Статус заказа'),
            'total' => $this->integer()->comment('Сумма заказа'),
        ]);

        $this->addForeignKey('fk_d_order_statuses_to_orders_fk_order_status', '{{%orders}}', 'fk_order_status', '{{%d_order_statuses}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_d_order_statuses_to_orders_fk_order_status', '{{%orders}}');
        $this->dropTable('{{%orders}}');
    }
}
