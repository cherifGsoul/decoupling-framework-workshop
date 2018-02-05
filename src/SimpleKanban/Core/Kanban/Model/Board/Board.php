<?php

namespace SimpleKanban\Core\Kanban\Model\Board;

class Board
{
  private $id;
  private $title;

  public function __construct($id, $title)
  {
    $this->id = $id;
    $this->title = $title;
    $this->status = 'open';
  }


  public static function open($id, $title)
  {
    $board = new Board($id, $title);
    return $board;
  }
}