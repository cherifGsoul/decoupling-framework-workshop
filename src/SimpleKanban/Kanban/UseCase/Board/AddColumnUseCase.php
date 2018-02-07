<?php

namespace SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\Model\Column\Column;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Column\ColumnGateway;

class AddColumnUseCase
{
    private $boardGateway;
    private $columnGateway;

    public function __construct(BoardGateway $boardGateway, ColumnGateway $columnGateway)
    {
        $this->boardGateway = $boardGateway;
        $this->columnGateway = $columnGateway;
    }

    public function handle($request)
    {
        $board = $this->boardGateway->forId($request->getBoardId());

        if (!$board) {
            throw new \Exception('The requested board dosent exist');
        }

        $column = new Column($this->columnGateway->nextIdentity(), $request->getColumnTitle(), $board->getId());
        $board->addColumn($column);
        $this->boardGateway->add($board);
    }
}
