<?php

use yii\db\Migration;

/**
 * Class m221019_095916_insert_into_diameters_table
 */
class m221019_095916_insert_into_diameters_table extends Migration
{
    private const TABLE_NAME = 'diameters';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(self::TABLE_NAME, ['value'], [
            [25],
            [30],
            [25],
            [40],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete(self::TABLE_NAME, ['value' => [25, 30, 25, 40]]);
    }
}
