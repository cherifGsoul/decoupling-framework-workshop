<?php

namespace SimpleKanban\Kanban\Model\Board;

use SimpleKanban\Kanban\Model\Column\ColumnId;
use SimpleKanban\Kanban\Model\Column\Column;
use Doctrine\Common\Collections\ArrayCollection;

class Board
{
    private $id;
    private $title;
    private $slug;
    private $columns;
    private $status;

    public function __construct(BoardId $id, $title, $slug, BoardStatus $status = null, array $columns = [])
    {
        $this->id = $id;
        $this->setTitle($title);
        $this->setSlug($slug);
        $this->setStatus(BoardStatus::OPEN());
        
        if (isset($status)) {
            $this->setStatus($status);
        }

        $this->columns = new ArrayCollection($columns);
    }

    public static function open(BoardId $id, $title, $slug)
    {
        $board = new Board($id, $title, $slug);
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
        return $this->columns->removeElement($column);
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
        
        if (false == $this->isOpen()) {
            throw new \Exception('The board is already closed');
        }
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
     * Get the value of slug
     */
    public function getSlug()
    {
        return $this->slug;
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


    private function setSlug($slug)
    {
        $this->slug = $slug;
    }
}
