<?php

namespace SimpleKanban\Kanban\UseCase\Board;

class CloseBoardRequest
{
	private $boardId;

	public function __construc($boardId)
	{
		$this->boardId = $boardId;
	}


    public function getBoardId()
    {
    	return $this->boardId;
    }
}
