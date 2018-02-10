<?php

namespace SimpleKanban\Kanban\UseCase\DataTransformer\Board;

use SimpleKanban\Kanban\Model\Board\Board;

class BoardDtoDataTransformer implements BoardDataTransformer
{
	private $board;

	public function write(Board $board)
	{
		$this->board = $board;
		return $this;
	}
	
	public function read()
	{
		return [
			'id' => $this->board->getId()->asString(),
			'title' => $this->board->getTitle(),
			'slug' => $this->board->getSlug(),
			'columns' => $this->transformColumns($this->board->getColumns()),
			'status' => $this->board->getStatus()->status()
		];
	}

	private function transformColumns($columns)
	{
		return $columns->map(function($column){
			return [
				'id' => $column->getId()->asString(),
				'title' => $column->getTitle(),
				'boardId' => $column->getBoardId()->asString()
			];
		});
	}
}