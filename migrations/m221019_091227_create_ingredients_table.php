<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ingredients}}`.
 */
class m221019_091227_create_ingredients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ingredients}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('Название ингредиента'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('Активен'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ingredients}}');
    }
}
