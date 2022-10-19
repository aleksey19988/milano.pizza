<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ready_pizzas}}`.
 */
class m221006_130052_create_ready_pizzas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ready_pizzas}}', [
            'id' => $this->primaryKey(),
            'pizza_id' => $this->integer()->notNull()->comment('ID пиццы'),
            'number_of_pieces' => $this->integer()->notNull()->comment('Количество кусочков'),
        ]);

        $this->addForeignKey('fk_ready_pizzas_pizza_id', '{{%ready_pizzas}}', 'pizza_id', 'pizzas', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_ready_pizzas_pizza_id', '{{%ready_pizzas}}');
        $this->dropTable('{{%ready_pizzas}}');
    }
}
