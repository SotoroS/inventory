<?php

use yii\db\Migration;

/**
 * Class m190910_114232_add_category_id_column_object_table
 */
class m190910_114232_add_category_id_column_object_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'object',
            'category_id',
            $this->integer()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(
            'object',
            'category_id'
        );
    }
}
