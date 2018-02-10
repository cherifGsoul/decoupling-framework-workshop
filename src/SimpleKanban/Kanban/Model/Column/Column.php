<?php

namespace SimpleKanban\Kanban\Model\Column;

use SimpleKanban\Kanban\Model\Board\BoardId;
use Doctrine\Common\Collections\ArrayCollection;

class Column
{
    private $id;
    private $title;
    private $cards;
    private $boardId;

    public function __construct(ColumnId $id, $title, BoardId $boardId)
    {
        $this->setId($id);
        $this->setTitle($title);
        $this->setBoardId($boardId);
        $this->cards = new ArrayCollection;
    }

    public function hasCards()
    {
        return count($this->cards) > 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getBoardId()
    {
        return $this->boardId;
    }

    private function setId(ColumnId $id)
    {
        $this->id = $id;
    }

    private function setTitle($title)
    {
        $this->title = $title;
    }

    private function setBoardId(BoardId $boardId)
    {
        $this->boardId = $boardId;
    }
    
}
