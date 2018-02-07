<?php

namespace SimpleKanban\Kanban\Model\Board;


class BoardTitleIsUniqueSpecification
{
	public function __construct(BoardGateway $boardGateway)
	{
		$this->boardGateway = $boardGateway;
	}

	public function isSatisfiedBy(Board $board)
	{
		if ($this->boardGateway->forTitle($board->getTitle())) {
			return false;
		}

		return true;
	}
}