<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pizza_ingredients}}`.
 */
class m221019_091335_create_pizza_ingredients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pizza_ingredients}}', [
            'id' => $this->primaryKey(),
            'pizza_id' => $this->integer()->notNull()->comment('ID пиццы'),
            'ingredient_id' => $this->integer()->notNull()->comment('ID ингредиента'),
        ]);

        $this->addForeignKey('fk_pizza_ingredients_pizza_id', '{{%pizza_ingredients}}', 'pizza_id', 'pizzas', 'id');
        $this->addForeignKey('fk_pizza_ingredients_ingredient_id', '{{%pizza_ingredients}}', 'ingredient_id', 'ingredients', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_pizza_ingredients_ingredient_id', '{{%pizza_ingredients}}');
        $this->dropForeignKey('fk_pizza_ingredients_pizza_id', '{{%pizza_ingredients}}');

        $this->dropTable('{{%pizza_ingredients}}');
    }
}
