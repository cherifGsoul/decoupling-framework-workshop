<?php

namespace SimpleKanban\Kanban\Model\Column;

class Column
{
    private $id;
    private $title;
    private $cards;

    public function __construct(ColumnId $id, $title)
    {
        $this->setId($id);
        $this->setTitle($title);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setId(ColumnId $id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function hasCards()
    {
        return count($this->cards) > 0;
    }
    
}
