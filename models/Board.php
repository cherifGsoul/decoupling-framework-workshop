<?php

namespace app\models;


class Board extends BaseBoard
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoardMembers()
    {
        return $this->hasMany(BoardMember::className(), ['board_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColumns()
    {
        return $this->hasMany(Column::className(), ['board_id' => 'id']);
    }
}
