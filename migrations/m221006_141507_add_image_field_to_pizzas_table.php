<?php

use yii\db\Migration;

/**
 * Class m221006_141507_add_image_field_to_pizzas_table
 */
class m221006_141507_add_image_field_to_pizzas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%d_pizzas}}', 'image_path', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%d_pizzas}}', 'image_path');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221006_141507_add_image_field_to_pizzas_table cannot be reverted.\n";

        return false;
    }
    */
}
