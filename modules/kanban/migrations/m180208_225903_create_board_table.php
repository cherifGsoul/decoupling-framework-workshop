<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%board}}`.
 */
class m180208_225903_create_board_table extends Migration
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

        $this->createTable('{{%board}}', [
            'id' => $this->string(36),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->addPrimaryKey('boar_pk', '{{%board}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%board}}');
    }
}
