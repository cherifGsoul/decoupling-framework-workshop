<?php

namespace app\modules\kanban\persistence\records;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "kbn_board".
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Column[] $columns
 */
class Board extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kbn_board';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'slug', 'status', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['id'], 'string', 'max' => 36],
            [['title', 'slug', 'status'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'slug' => 'Slug',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColumns()
    {
        return $this->hasMany(Column::className(), ['board_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    public function extraFields()
    {
        return ['columns'];
    }
}
