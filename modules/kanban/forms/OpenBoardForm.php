<?php

namespace app\modules\kanban\forms;

use yii\base\Model;

class OpenBoardForm extends Model
{
	public $title;

	public function rules()
	{
		return [
			['title', 'required']
		];
	}
}