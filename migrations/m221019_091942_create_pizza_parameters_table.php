<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pizza_parameters}}`.
 */
class m221019_091942_create_pizza_parameters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pizza_parameters}}', [
            'id' => $this->primaryKey(),
            'pizza_id' => $this->integer()->notNull()->comment('ID пиццы'),
            'diameter_id' => $this->integer()->notNull()->comment('ID диаметра'),
            'weight' => $this->integer()->notNull()->comment('Вес, грамм'),
            'pizza_price' => $this->integer()->notNull()->comment('Стоимость целой пиццы'),
            'piece_price' => $this->integer()->notNull()->comment('Стоимость кусочка пиццы'),
        ]);

        $this->addForeignKey('fk_pizza_parameters_pizza_id', '{{%pizza_parameters}}', 'pizza_id', 'pizzas', 'id');
        $this->addForeignKey('fk_pizza_parameters_ingredient_id', '{{%pizza_parameters}}', 'diameter_id', 'diameters', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_pizza_parameters_ingredient_id', '{{%pizza_parameters}}');
        $this->dropForeignKey('fk_pizza_parameters_pizza_id', '{{%pizza_parameters}}');

        $this->dropTable('{{%pizza_parameters}}');
    }
}
