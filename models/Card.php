<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kbn_card".
 *
 * @property int $id
 * @property string $description
 * @property int $due_date
 * @property int $created_at
 * @property int $updated_at
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kbn_card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['due_date', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'due_date' => 'Due Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
