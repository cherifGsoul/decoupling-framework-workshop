<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kbn_board_member".
 *
 * @property int $board_id
 * @property int $member_id
 *
 * @property Board $board
 * @property User $member
 */
class BoardMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%board_member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['board_id', 'member_id'], 'required'],
            [['board_id', 'member_id'], 'integer'],
            [['board_id'], 'exist', 'skipOnError' => true, 'targetClass' => Board::className(), 'targetAttribute' => ['board_id' => 'id']],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['member_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'board_id' => 'Board ID',
            'member_id' => 'Member ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoard()
    {
        return $this->hasOne(Board::className(), ['id' => 'board_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(User::className(), ['id' => 'member_id']);
    }
}
