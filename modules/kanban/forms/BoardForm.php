<?php

namespace app\modules\kanban\forms;

use yii\base\Model;

class BoardForm extends Model
{
	public $id;
	public $title;
	public $status;

	public function rules()
	{
		return [
			['id', 'required'],
			[['id', 'title', 'status'], 'string']
		];
	}
}