<?php

namespace SimpleKanban\Core\Kanban\Model\Board;

interface Specification
{
	public function isSatisfiedBy($entity);
}