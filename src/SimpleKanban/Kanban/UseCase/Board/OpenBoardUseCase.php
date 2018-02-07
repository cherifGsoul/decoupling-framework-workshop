<?php

namespace SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Board\BoardTitleIsUniqueSpecification;
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
      $this->boardGateway->nextIdentity(),
      $request->getTitle()
    );
    $titleIsUniqueSpecification = new BoardTitleIsUniqueSpecification($this->boardGateway);

    if (false == $titleIsUniqueSpecification->isSatisfiedBy($board)){
      throw new Exception('A board with the same already exist');  
    }
    $this->boardGateway->add($board);
  }
}