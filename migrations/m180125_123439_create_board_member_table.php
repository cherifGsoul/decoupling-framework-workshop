<?php

use yii\db\Migration;

/**
 * Handles the creation of table `board_member`.
 */
class m180125_123439_create_board_member_table extends Migration
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
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%board_member}}', [
            'board_id' => $this->integer()->notNull(),
            'member_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('board_member_board_fk', '{{%board_member}}', 'board_id', '{{%board}}', 'id');
        $this->addForeignKey('board_member_member_fk', '{{%board_member}}', 'member_id', '{{%user}}', 'id');
        $this->addPrimaryKey('board_member_pk', '{{%board_member}}', ['board_id','member_id']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%board_member}}');
    }
}
