<?php

namespace app\modules\kanban\model;

use SimpleKanban\Kanban\Model\Column\ColumnFactory as ColumnFactoryInterface;
use SimpleKanban\Kanban\Model\Column\Column;
use SimpleKanban\Kanban\Model\Column\ColumnId;

class ColumnFactory implements ColumnFactoryInterface
{
	public function fromRawData(array $data)
	{
		return new Column(
			ColumnId::fromString($data['id']),
			$data['title'],
			$data['cards'],
			$data['board_id']
		);
	}
}