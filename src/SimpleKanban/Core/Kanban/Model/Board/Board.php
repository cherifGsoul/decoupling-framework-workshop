<?php

namespace SimpleKanban\Core\Kanban\Model\Board;

use SimpleKanban\Core\Kanban\Model\Column\Column;
USE Doctrine\Common\Collections\ArrayCollection;

class Board
{
    private $id;
    private $title;
    private $columns;
    private $status;

    public function __construct(BoardId $id, $title)
    {
        $this->id = $id;
        $this->setTitle($title);
        $this->setStatus(BoardStatus::OPEN());
        $this->columns = new ArrayCollection;
    }

    public static function open(BoardId $id, $title)
    {
        $board = new Board($id, $title);
        return $board;
    }

    public function hasColumns()
    {
        return count($this->columns) > 0;
    }

    public function addColumn(Column $column)
    {
        $this->columns->add($column);
    }

    public function removeColumn(Column $column)
    {
        $this->columns->removeElement($column);
    }

    public function isOpen()
    {
        return $this->status->equals(BoardStatus::OPEN());
    }

    public function changeTitle($title)
    {
        $this->setTitle($title);
    }

    public function close()
    {
        $this->setStatus(BoardStatus::CLOSED());
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of columns
     */ 
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }


    /**
     * Set the value of title
     *
     * @return  self
     */
    private function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    private function setStatus($status)
    {
        $this->status = $status;
    }
}
