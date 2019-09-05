<?php

use yii\db\Migration;

/**
 * Class m190903_120006_create_link_object_status
 */
class m190903_120006_create_link_object_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'FK_object_status_link',
            'object',
            'status_id',
            'status',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_object_status_link', 'object');
    }
}
