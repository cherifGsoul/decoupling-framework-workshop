<?php

namespace SimpleKanban\Kanban\UseCase\Board;

use SimpleKanban\Kanban\Model\Board\Board;
use SimpleKanban\Kanban\Model\Board\BoardGateway;
use SimpleKanban\Kanban\Model\Board\BoardTitleIsUniqueSpecification;
use SimpleKanban\Common\UseCase\UseCase;
use SimpleKanban\Kanban\UseCase\DataTransformer\Board\BoardDataTransformer;
use SimpleKanban\Kanban\Model\Board\BoardTitleSluggifier;

class OpenBoardUseCase implements UseCase
{
  private $boardGateway;
  private $boardDataTransformer;
  private $sluggifier;

  /**
   * Undocumented function
   *
   * @param BoardGateway $boardGateway
   */
  public function __construct(BoardGateway $boardGateway, BoardDataTransformer $boardDataTransformer, BoardTitleSluggifier $sluggifier)
  {
    $this->boardGateway = $boardGateway;
    $this->boardDataTransformer = $boardDataTransformer;
    $this->sluggifier = $sluggifier;
  }

  /**
   * Undocumented function
   *
   * @param [type] $request
   * @return void
   */
  public function handle($request)
  {
    // create the entity
    $board = Board::open(
      $this->boardGateway->nextIdentity(),
      $request->getTitle(),
      $this->sluggifier->sluggify($request->getTitle())
    );
    
    //check if a board exists with the same tite
    $titleIsUniqueSpecification = new BoardTitleIsUniqueSpecification($this->boardGateway);

    // throw exception if a board with the same title already exist
    if (false == $titleIsUniqueSpecification->isSatisfiedBy($board)) {
      throw new \Exception('A board with the same already exist');  
    }

    //persist the board
    $this->boardGateway->persist($board);

    $this->boardDataTransformer->write($board);
    return $this->boardDataTransformer->read();
  }
}