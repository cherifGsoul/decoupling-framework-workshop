<?php

namespace SimpleKanban\Kanban\Model\Board;

interface Specification
{
	public function isSatisfiedBy($entity);
}