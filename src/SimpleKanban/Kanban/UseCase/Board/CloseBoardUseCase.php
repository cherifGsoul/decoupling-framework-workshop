<?php

namespace SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Board\BoardId;

class CloseBoardUseCase
{
	private $boardGateway;

	public function __construct(BoardGateway $boardGateway)
	{
		$this->boardGateway = $boardGateway;
	}

    public function handle($request)
    {
    	$board = $this->boardGateway->forId($request->getBoardId());
    	if (!$board) {
    		throw new \Exception('The requested board does not exist');
    	}

    	$board->close();
    	$this->boardGateway->add($board);
    }
}
