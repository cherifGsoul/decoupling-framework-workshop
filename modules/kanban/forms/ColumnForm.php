<?php

namespace app\modules\kanban\forms;

use yii\base\Model;

class ColumnForm extends Model
{
	public $boardId;
	public $title;

	public function rules()
	{
		return [
			[['boardId', 'title'], "required"],
			[['boardId', 'title'], "string"]
		];
	}
}