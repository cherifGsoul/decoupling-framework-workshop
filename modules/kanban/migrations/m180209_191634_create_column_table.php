<?php

use yii\db\Migration;

/**
 * Handles the creation of table `column`.
 */
class m180209_191634_create_column_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%column}}', [
            'id' => $this->string(36)->unique(),
            'title' => $this->string()->notNull(),
            'board_id' => $this->string(36),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);
        $this->addPrimaryKey('column_pk', '{{%column}}', 'id');
        $this->addForeignKey('board_fk', '{{%column}}', 'board_id', '{{%board}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%column}}');
    }
}
