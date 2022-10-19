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
            'weight' => $this->integer()->comment('Вес пиццы'),
            'price' => $this->integer()->comment('Стоимость пиццы'),
            'piece_price' => $this->integer()->comment('Стоимость кусочка пиццы'),
            'image_path' => $this->string()->comment('Расположение изображения'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('Активен'),
        ]);

        $this->addForeignKey('fk_diameters_id_to_d_pizzas_fk_diameter', '{{%d_pizzas}}', 'fk_diameter', '{{%d_diameters}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_diameters_id_to_d_pizzas_fk_diameter', '{{%d_pizzas}}');
        $this->dropTable('{{%d_pizzas}}');
    }
}
