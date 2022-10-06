<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%d_ingredients}}`.
 */
class m221006_112910_create_d_ingredients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%d_ingredients}}', [
            'id' => $this->primaryKey(),
            'ingredient_name' => $this->string()->notNull()->comment('Название ингредиента'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('Активен'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%d_ingredients}}');
    }
}
