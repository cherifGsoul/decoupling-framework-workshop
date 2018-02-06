<?php

namespace SimpleKanban\Core\Kanban\Model\Column;

class Column
{
    private $title;
    private $cards;
    public function __construct($title)
    {
        $this->setTitle($title);
    }

    public function getTitle()
    {
        return $this->title;
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
