<?php

namespace SimpleKanban\Kanban\UseCase\DataTransformer\Board;

use SimpleKanban\Kanban\Model\Board\Board;

interface BoardDataTransformer
{
	public function write(Board $board);
	public function read();
}