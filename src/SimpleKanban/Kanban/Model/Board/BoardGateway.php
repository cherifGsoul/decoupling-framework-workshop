<?php

namespace SimpleKanban\Kanban\Model\Board;

interface BoardGateway
{
  public function nextIdentity();
  public function add(Board $board);
  public function forTitle($title);
  public function forId(BoardId $id);
}