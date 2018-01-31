<?php

use yii\db\Migration;

/**
 * Handles the creation of table `card`.
 */
class m180125_154025_create_card_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%card}}', [
            'id' => $this->primaryKey(),
            'description' => $this->string(),
            'due_date' => $this->integer(),
            
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%card}}');
    }
}
