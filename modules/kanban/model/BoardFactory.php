<?php

namespace app\modules\kanban\model;

use SimpleKanban\Kanban\Model\Board\BoardFactory as BoardFactoryInterface;
use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Column\Column;
use SimpleKanban\Kanban\Model\Column\ColumnId;
use SimpleKanban\Kanban\Model\Board\BoardStatus;
use SimpleKanban\Kanban\Model\Board\BoardId;

class BoardFactory implements BoardFactoryInterface
{
	public function fromRawData(array $data)
	{
		$columns = [];
		
		if (!empty($data['columns'])) {

			$columns = array_map(function($column) {
				
				return new Column(
						ColumnId::fromString($column['id']),
						$column['title'],
						BoardId::fromString($column['board_id'])			
				);
			}, $data['columns']);

		}

		
		return new Board(
			BoardId::fromString($data['id']),
			$data['title'],
			$data['slug'],
			BoardStatus::fromString($data['status']),
			$columns
		);
	}
}