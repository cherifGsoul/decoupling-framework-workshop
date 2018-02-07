<?php

namespace SimpleKanban\Kanban\UseCase\Board;

class RemoveColumnRequest
{
    private $columnId;
    private $boardId;

    public function getColumnId()
    {
        return $this->columnId;
    }

    public function getBoardId()
    {
        return $this->boardId;
    }
}
