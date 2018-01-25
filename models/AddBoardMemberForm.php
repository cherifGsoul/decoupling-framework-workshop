<?php

namespace app\models;

use Yii;
use yii\base\Model;

class AddBoardMemberForm extends Model
{
    public $boardId;
    public $memberId;

    public function rules()
    {
        return [
            [['boardId', 'memberId'], 'required'],
            [['boardId'], 'exist', 'skipOnError' => true, 'targetClass' => Board::className(), 'targetAttribute' => ['boardId' => 'id']],
            [['memberId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['memberId' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'boardId' => 'Board',
            'memberId' => 'Member',
        ];
    }
}