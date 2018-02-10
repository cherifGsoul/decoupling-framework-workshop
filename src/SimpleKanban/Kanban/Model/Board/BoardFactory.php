<?php

namespace SimpleKanban\Kanban\Model\Board;

interface BoardFactory
{
	public function fromRawData(array $data);
}