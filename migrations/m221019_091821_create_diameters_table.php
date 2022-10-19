<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%diameters}}`.
 */
class m221019_091821_create_diameters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%diameters}}', [
            'id' => $this->primaryKey(),
            'value' => $this->integer()->notNull()->comment('Размер, см'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('Активен'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%diameters}}');
    }
}
