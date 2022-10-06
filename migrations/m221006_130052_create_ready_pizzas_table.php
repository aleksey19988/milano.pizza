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
            'fk_pizza' => $this->integer()->notNull()->comment('Наименование пиццы'),
            'number_of_pieces' => $this->integer()->notNull()->comment('Количество кусочков'),
        ]);

        $this->addForeignKey('fk_id_d_pizzas_to_fk_pizza_ready_pizzas', '{{%ready_pizzas}}', 'fk_pizza', 'd_pizzas', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_id_d_pizzas_to_fk_pizza_ready_pizzas', '{{%ready_pizzas}}');
        $this->dropTable('{{%ready_pizzas}}');
    }
}
