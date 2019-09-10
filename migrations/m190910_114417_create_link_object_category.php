<?php

use yii\db\Migration;

/**
 * Class m190910_114417_create_link_object_category
 */
class m190910_114417_create_link_object_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'FK_object_category_link',
            'object',
            'category_id',
            'category',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_object_category_link', 'object');
    }
}
