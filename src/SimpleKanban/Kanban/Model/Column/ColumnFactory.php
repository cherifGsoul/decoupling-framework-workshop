<?php

namespace SimpleKanban\Kanban\Model\Column;

interface ColumnFactory
{
	public function fromRawData(array $data);
}