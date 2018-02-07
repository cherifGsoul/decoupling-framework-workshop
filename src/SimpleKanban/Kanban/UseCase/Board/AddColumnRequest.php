<?php

namespace SimpleKanban\Kanban\UseCase\Board;

class AddColumnRequest
{
    private $boardId;
    private $columnTitle;

    public function __construct($boardId, $columnTitle)
    {
        $this->boardId = $boardId;
        $this->columnTitle = $columnTitle;
    }

    /**
     * Get the value of boardId
     */ 
    public function getBoardId()
    {
        return $this->boardId;
    }

    /**
     * Get the value of columnTitle
     */ 
    public function getColumnTitle()
    {
        return $this->columnTitle;
    }
}
