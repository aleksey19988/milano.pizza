<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%d_diameters}}`.
 */
class m221006_112636_create_d_diameters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%d_diameters}}', [
            'id' => $this->primaryKey(),
            'diameter_value' => $this->integer()->notNull()->comment('Диаметр (см)'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('Активен'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%d_diameters}}');
    }
}
