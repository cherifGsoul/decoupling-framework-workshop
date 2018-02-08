<?php

namespace SimpleKanban\Kanban\Model\Board;

use SimpleKanban\Common\Model\Specification;

class BoardTitleIsUniqueSpecification implements Specification
{
	/**
	 * Undocumented function
	 *
	 * @param BoardGateway $boardGateway
	 */
	public function __construct(BoardGateway $boardGateway)
	{
		$this->boardGateway = $boardGateway;
	}

	/**
	 * Undocumented function
	 *
	 * @param Board $board
	 * @return boolean
	 */
	public function isSatisfiedBy($board)
	{
		if ($this->boardGateway->forTitle($board->getTitle())) {
			return false;
		}

		return true;
	}
}