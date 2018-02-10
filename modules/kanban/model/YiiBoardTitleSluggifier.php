<?php

namespace app\modules\kanban\services;

use SimpleKanban\Kanban\Model\Board\BoardTitleSluggifier;
use yii\helpers\Inflector;

class YiiBoardTitleSluggifier implements BoardTitleSluggifier
{
	public function sluggify($title)
	{
		if (is_string($title)) {
			return Inflector::slug($title);	
		}
		
	}
}