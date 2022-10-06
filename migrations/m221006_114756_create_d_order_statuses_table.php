<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%d_order_statuses}}`.
 */
class m221006_114756_create_d_order_statuses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%d_order_statuses}}', [
            'id' => $this->primaryKey(),
            'status_name' => $this->string()->comment('Наименование статуса'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('Активен'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%d_order_statuses}}');
    }
}
