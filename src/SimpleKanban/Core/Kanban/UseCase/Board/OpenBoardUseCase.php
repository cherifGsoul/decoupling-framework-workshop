<?php

namespace SimpleKanban\Core\Kanban\UseCase\Board;

use SimpleKanban\Core\Kanban\Model\Board\Board;
use SimpleKanban\Core\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Common\UseCase\UseCase;

class OpenBoardUseCase
{
  private $boardGateway;

  /**
   * Undocumented function
   *
   * @param BoardGateway $boardGateway
   */
  public function __construct(BoardGateway $boardGateway)
  {
    $this->boardGateway = $boardGateway;
  }

  /**
   * Undocumented function
   *
   * @param [type] $request
   * @return void
   */
  public function handle($request)
  {
    $board = Board::open(
      $request->getTitle()
    );

    $this->boardGateway->add($board);

  }
}