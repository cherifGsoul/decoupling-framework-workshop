<?php

namespace app\modules\kanban\persistence\records;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "kbn_column".
 *
 * @property string $id
 * @property string $title
 * @property string $board_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Board $board
 */
class Column extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kbn_column';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['id', 'board_id'], 'string', 'max' => 36],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['id'], 'unique'],
            [['board_id'], 'exist', 'skipOnError' => true, 'targetClass' => Board::className(), 'targetAttribute' => ['board_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'board_id' => 'Board ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoard()
    {
        return $this->hasOne(Board::className(), ['id' => 'board_id']);
    }

     public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }
}
