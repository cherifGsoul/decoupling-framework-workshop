<?php

namespace SimpleKanban\Core\Kanban\Model\Board;

use SimpleKanban\Core\Kanban\Model\Column\Column;

class Board
{
    const STATUS_OPEN = 'open';
    const STATUS_CLOSED = 'closed';

    private $id;
    private $title;
    private $columns;
    private $status;

    public function __construct()
    {
        $this->setStatus(self::STATUS_OPEN);
        $this->columns = [];
    }

    public static function open($id, $title)
    {
        $board = new Board();

        $board->setId($id);
        $board->setTitle($title);

        return $board;
    }

    public function hasColumns()
    {
        return count($this->columns) > 0;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    public function addColumn(Column $column)
    {
        $this->columns[] = $column;
    }

    public function removeColumn(Column $column)
    {
        $key = array_search($column, $this->columns, true);

        if ($key === false) {
            return false;
        }

        unset($this->columns[$key]);

        return true;
    }

    public function isOpen()
    {
        return $this->status == self::STATUS_OPEN;
    }

    public function changeTitle($title)
    {
        $this->setTitle($title);
    }

    public function close()
    {
        $this->setStatus(self::STATUS_CLOSED);
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    private function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
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
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
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
