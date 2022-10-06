<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%d_pizzas}}`.
 */
class m221006_113253_create_d_pizzas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%d_pizzas}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('Название пиццы'),
            'weight' => $this->integer()->comment('Вес пиццы'),
            'fk_diameter' => $this->integer()->comment('Диаметр пиццы'),
            'ingredients' => $this->integer()->comment('Ингредиенты'),
            'price' => $this->integer()->comment('Стоимость пиццы'),
            'piece_price' => $this->integer()->comment('Стоимость кусочка пиццы'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('Активен'),
        ]);

        $this->addForeignKey('fk_diameters_id_to_d_pizzas_fk_diameter', '{{%d_pizzas}}', 'fk_diameter', '{{%d_diameters}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_diameters_id_to_d_pizzas_diameter_id', '{{%d_pizzas}}');
        $this->dropTable('{{%d_pizzas}}');
    }
}
