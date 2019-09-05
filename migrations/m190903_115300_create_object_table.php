<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%object}}`.
 */
class m190903_115300_create_object_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%object}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'inventory_id' => $this->string(),
            'budget' => $this->string(),
            'date' => $this->date(),
            'count' => $this->integer(),
            'cost' => $this->double(),
            'position' => $this->string(),
            'description' => $this->string(),
            'status_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%object}}');
    }
}
