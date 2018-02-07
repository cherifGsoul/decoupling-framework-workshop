<?php

namespace SimpleKanban\Kanban\UseCase\Board;

class OpenBoardRequest
{
  private $title;

  public function __construct($title)
  {
    $this->title = $title;
  }

  public function getTitle()
  {
    return $this->title;
  }
}