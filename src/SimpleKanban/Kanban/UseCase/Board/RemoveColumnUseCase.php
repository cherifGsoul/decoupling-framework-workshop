<?php

namespace SimpleKanban\Kanban\UseCase\Board;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Column\ColumnGateway;
use SimpleKanban\Common\UseCase\UseCase;

class RemoveColumnUseCase implements UseCase
{
    public function __construct(BoardGateway $boardGateway, ColumnGateway $columnGateway)
    {
        $this->boardGateway = $boardGateway;
        $this->columnGateway = $columnGateway;
    }

    public function handle($request)
    {
        $column = $this->columnGateway->forId($request->getColumnId());
        $board = $this->boardGateway->forId($request->getBoardId());

        if (!$column) {
            throw new \Exception('the requested column does not exist');
        }

        if (!$board) {
            throw new \Exception('the requested board does not exist');
        }

        $board->removeColumn($column);
        $this->boardGateway->add($board);
    }
}
