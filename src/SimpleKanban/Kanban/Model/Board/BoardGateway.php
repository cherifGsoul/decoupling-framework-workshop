<?php

namespace SimpleKanban\Kanban\Model\Board;

interface BoardGateway
{
  /**
   * Undocumented function
   *
   * @return BoardId
   */
  public function nextIdentity();

  /**
   * Undocumented function
   *
   * @param Board $board
   * @return void
   */
  public function add(Board $board);

  /**
   * Undocumented function
   *
   * @param string $title
   * @return Board
   */
  public function forTitle($title);

  /**
   * Undocumented function
   *
   * @param BoardId $id
   * @return Board
   */
  public function forId(BoardId $id);
}