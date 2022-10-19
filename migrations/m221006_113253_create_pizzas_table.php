<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pizzas}}`.
 */
class m221006_113253_create_pizzas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pizzas}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('Название пиццы'),
            'image_path' => $this->string()->comment('Расположение изображения'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('Активен'),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%d_pizzas}}');
    }
}
